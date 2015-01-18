---
title: Polycom SoundPoint IP 550 Configuration
layout: post
category: blog
tags:
- VoIP
- SIP
- Polycom SoundPoint IP 550
permalink: /blog/2012/07/16/polycom-soundpoint-ip-550

---
{% include JB/setup %}
<div id="node-165" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Polycom SoundPoint IP 550 is a highly-regarded VoIP phone. It is a mid-range phone that fills both the technological requirements and the tactile sensation that it is a solid device. It is either a preferred or supported device with most VoIP vendors, with the exception of those who are entirely loyal to other specific brands. It is unknown how many of the notes below would apply to other Polycom models or to other vendor models. Given the amount of web searching and troubleshooting, there are probably hundreds of other web resources that I consulted and dozens of other tidbits picked up, but these are at least some of the highlights.</p>
<h2>
	Accessing Polycom Configurations</h2>
<ol><li>
		Phone configuration: press the Menu key</li>
	<li>
		Web configuration: navigate to the phone's IP in a browser</li>
	<li>
		Server configuration: the proper way to approach this particular model - requires a server</li>
</ol><h2>
	Configuration Management</h2>
<p>This phone is definitely designed for consolidated XML-based configuration. Configuring on the phone itself is time-consuming, and I am relatively confident that some configurations cannot be accessed on the phone or web interfaces.</p>
<h3>
	Basic Structure</h3>
<p>The IP550 is a client device. That is the first and foremost concept behind how the centralized configurations work. It is the client that connects to your FTP server to download configurations (you do not FTP into it), and it FTPs log files to your server (you do not FTP into it). So it does both pull and push operations - but it directly receives neither pull nor push operations in terms of the centralized configurations option.</p>
<h3>
	Configuration Templates and Server Setup</h3>
<ol><li>
		<a href="http://support.polycom.com/PolycomService/support/us/support/voice/soundpoint_ip/soundpoint_ip550.html">Start by downloading the appropriate configuration software from Polycom.</a> You should match the version to the SIP Version specified on the Home tab of the Polycom web interface. In our case, it was UC Software 3.3.3. If you are up for an adventure, you can update the firmware before even starting your setup so that you are using the latest and greatest. As of April 2012, they had progressed to 4.0.2B. Note that the split files are recommended for systems with BootROM 4.0 or newer (see Home tab on your phone's web interface).</li>
	<li>
		<a href="http://support.polycom.com/PolycomService/support/us/support/voice/soundpoint_ip/soundpoint_ip550.html">Download the administrator's guide for your particular UC version before continuing (see Documents section down the page).</a></li>
	<li>
		Extract the zip file to a folder accessible via FTP (or other supported protocol) and begin the customization process.</li>
	<li>
		The extracted folder should be the default folder for the "PlcmSplp" FTP account (or other, if you changed it).</li>
	<li>
		Once ready, the phone will download the 000000000000.cfg file, which can include phone-specific configuration files by reference.</li>
	<li>
		Phone-specific configuration files are included by something as simple as: CONFIG_FILES="[PHONE_MAC_ADDRESS]-user.cfg, 000-site-basic.cfg"
		<ul style=""><li>
				This example has one universal config file and one phone-specific config file.</li>
			<li>
				Configs are included right-to-left such that the first (leftmost) in the list overrides everything after it. The user-specific configuration only really needs to include the registration and extension info. In documentat, this is the reg.x namespace, which translates to reg.1 for the first registration.</li>
		</ul></li>
	<li>
		Additional phone configuration files may be created at some point:
		<ul style=""><li>
				[PHONE_MAC_ADDRESS]-web.cfg: This is created automatically by the web admin to store any configurations manually changed via the web admin. This overrides any centralized config.</li>
			<li>
				[PHONE_MAC_ADDRESS]-directory.xml: This is created automatically when a directory entry is added on the phone. You can also change the XML on the server to quickly add more contacts after the next reboot.</li>
			<li>
				[PHONE_MAC_ADDRESS]-local.cfg: This is created automatically when a configuration is changed manually on the phone (not the web admin). I suggest that you absorb these settings into the -user.cfg, delete this file, and reboot the phone.</li>
		</ul></li>
</ol><h3>
	Phone Setup for Centralized Config Management</h3>
<ol><li>
		You will need the IP of the phone. Your life will be much easier if you can support static DHCP for your phones so that you do not have to continuously look up the IPs. You can further simplify your life by making the IP addresses correspond to their extensions. For instance, have 10.1.1.201 be the IP address for extension 201.</li>
	<li>
		Configure the FTP connection information to point at the server (and folder) where you store the config files. On the phone, go to Menu &gt; Settings &gt; Advanced (default passcode is 456) &gt; Admin Settings &gt; Network Configuration &gt; Server.</li>
	<li>
		Upon next reboot (and each subsequent reboot), the phone will update its configurations from the server on boot.</li>
</ol><h3>
	Logging and Debugging</h3>
<ol><li>
		The renderLevel attribute in each case below is on a 0-6 scale where 0=logs the most (e.g., for debugging) and 6=logs the least (e.g., for major problems only).</li>
	<li>
		<strong>Syslog</strong>: Within one of your configuration files (depending on whether you want phone or org debugging), you can enable syslog debugs with this XML element:<br />
		&lt;device.syslog device.syslog.facility="" device.syslog.prependMac="1" device.syslog.renderLevel="0" device.syslog.serverName="IP_OR_HOSTNAME" device.syslog.transport="" /&gt;</li>
	<li>
		<strong>FTP Logs</strong>: Within the 000000000000.cfg file, add LOG_FILE_DIRECTORY="/LOGS/". The phone will prepend its MAC to the file names so that there are no conflicts. The log files auto-purge by default when a file size based on these two configs: log.render.file.upload.append.sizeLimit="512" (in KB) and log.render.file.upload.append.limitMode="delete".</li>
</ol><h2>
	Usability Tip</h2>
<p>You can test configurations using the web interface. Once you have a phone working, simply move the configurations from the -web.cfg file to the -user.cfg or organization-wide cfg depending on its applicable scope. This gives you the best of both worlds -- a GUI for testing and a distributable format for maintenance.</p>
<h2>
	Remote Reset</h2>
<p>The web interface for the phone does not have a reboot button. This seems utterly bizarre to me, especially given that server-based configurations seem to be essential for the phone. Fortunately, there is a non-invasive way to trigger a reboot, as identified in a <a href="http://help.fonality.com/IP_Phones/Polycom/Polycom_Remote_Reset">video</a>. Simply go to the "SIP" tab, change the Digitmap Timeout value and click "Submit". Changing the value between 3 and 4 does not have a substantive impact on user experience, but it does trigger a phone reboot, which loads any configuration changes as a side-effect.</p>
<h2>
	DTMF - Dialing for Remote IVR Systems</h2>
<p>To reduce complexity, we stripped away most of the unused configurations on the server. However, we discovered that the default DTMF must exist in one of the XML files for you to be able to dial on a remote IVR system. This could be specific to use with our other devices, but it should be safe to add to any configuration since it is the default provided by Polycom. Dialing worked correctly on our local PBX without a DTMF section, but dialing was not being proxied to remote systems until we restored this XML to the configuration:</p>
<pre>
&lt;DTMF tone.dtmf.level="-15"
      tone.dtmf.onTime="50" tone.dtmf.offTime="50" 
      tone.dtmf.chassis.masking="0" tone.dtmf.stim.pac.offHookOnly="0" 
      tone.dtmf.viaRtp="1" tone.dtmf.rfc2833Control="1" tone.dtmf.rfc2833Payload="101"/&gt;</pre>
</div></div></div>  </div>
</div>
