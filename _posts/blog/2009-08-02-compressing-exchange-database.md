---
title: Compressing an Exchange Database
layout: post
category: blog
tech:
- Microsoft Exchange
- Windows Server 2003
permalink: /blog/2009/08/02/compressing-exchange-database

---
{% include JB/setup %}
<div id="node-63" class="node node-blog node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>Exchange experiences massive database bloat, similar to Access databases. Over time, this becomes a major problem for backups since new data is written into random empty space in the database. That creates a situation where a few new emails can cause the entire database to require a backup. Performing an "offline backup" automatically compresses the database, but I found a lack of documentation on how it was performed. Once the commands are identified, it is actually quite simple. The directories and database names are standard for a basic install on Windows SBS 2003.</p>
<p>First, select "<strong>Dismount Store</strong>" on the mailbox store.</p>
<p>Then, open a <strong>command prompt</strong> and run the following:</p>
<pre>
C:\Program Files\Support Tools&gt;<strong>cd C:\Program Files\Exchsrvr\MDBDATA</strong>
C:\Program Files\Exchsrvr\MDBDATA&gt;<strong>..\bin\eseutil.exe /d priv1.edb</strong>
Microsoft(R) Exchange Server Database Utilities
Version 6.5
Copyright (C) Microsoft Corporation. All Rights Reserved.
Initiating DEFRAGMENTATION mode...
            Database: priv1.edb
      Streaming File: priv1.STM
      Temp. Database: TEMPDFRG7700.EDB
Temp. Streaming File: TEMPDFRG7700.STM
                  Defragmentation Status (% complete)
          0    10   20   30   40   50   60   70   80   90  100
          |----|----|----|----|----|----|----|----|----|----|
          ...................................................
Moving 'TEMPDFRG7700.EDB' to 'priv1.edb'... DONE!
Moving 'TEMPDFRG7700.STM' to 'priv1.stm'... DONE!
Note:
  It is recommended that you immediately perform a full backup
  of this database. If you restore a backup made before the
  defragmentation, the database will be rolled back to the state
  it was in at the time of that backup.
Operation completed successfully in 3884.282 seconds.
C:\Program Files\Exchsrvr\MDBDATA&gt;</pre>
<p>Close the command prompt</p>
<p>Finally, <strong>remount the email store</strong>.</p></div></div></div>  </div>
</div>
