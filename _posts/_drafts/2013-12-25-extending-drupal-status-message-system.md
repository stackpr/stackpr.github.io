---
title: Extending drupal status message system
layout: post
category: blog
tags:
- Drupal
permalink: /blog/2013/12/25/extending-drupal-status-message-system
published: false

---
{% include JB/setup %}

Review the extended drupal status messages used on Do50.

<pre class="brush:php">
// Custom module
function mymodule_js_alter(&$js) {
  $tpl = array(
    'scope' => 'footer',
    'type' => 'inline',
    'defer' => FALSE,
    'data' => '',
    'every_page' => FALSE,
    'group' => JS_DEFAULT,
    'weight' => 5,
    'cache' => FALSE,
    'preprocess' => FALSE,
  );
  foreach (drupal_get_messages('js') as $type => $messages) {
    foreach ($messages as $msg) {
      if (is_array($msg)) {
        if (isset($msg['id'])) {
          $js[$msg['id']] = array_merge($tpl, $msg);
        }
        else {
          $js[] = array_merge($tpl, $msg);
        }
      }
      else {
        $js[] = array_merge($tpl, array(
          'data' => $msg,
        ));
      }
    }
  }
}
// template.php
function mytheme_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
    'console' => t('Console message'),
  );
  if (user_access('access administration menu')) {
    $status_heading['debug-status'] = t('Debug status message');
    $status_heading['debug-warning'] = t('Debug warning message');
    $status_heading['debug-error'] = t('Debug error message');
    $status_heading['debug-console'] = t('Debug console message');
  }

  $message_replacements = array(
    '@Account .* has been updated.@' => 'Your settings have been updated.',
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $prefix = '';

    // We want to keep js messages in the queue for the alter hook
    if ($type === 'js') {
      foreach ($messages as $message) {
        drupal_set_message($message, $type);
      }
    }

    // Some message types are not visible to all users.
    if (!isset($status_heading[$type])) {
      continue;
    }
    elseif (substr($type, 0, 6) === 'debug-') {
      $type = substr($type, 6);
      $prefix = 'DEBUG: ';
    }

    // Add this after the debug- detection so that code can be added
    // as 'console' or as 'debug-console'.
    if ($type === 'console') {
      foreach ($messages as $message) {
        drupal_set_message('console.log(' . json_encode($prefix . $message)
          . ');', 'js');
      }
      continue;
    }

    $output .= "<div class=\"messages $type\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type]
        . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        foreach ($message_replacements as $search => $replace) {
          if (preg_match($search, $message)) {
            $message = $replace;
            break;
          }
        }
        $output .= '  <li>' . $prefix . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $message = $messages[0];
      foreach ($message_replacements as $search => $replace) {
        if (preg_match($search, $message)) {
          $message = $replace;
          break;
        }
      }
      $output .= $message;
    }
    $output .= "</div>\n";
  }
  return $output;
}
</pre>
