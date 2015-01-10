---
title: Volunteer Committee Draft
layout: post
category: portfolio
tech:
- PHP
position:
- IT Director
- Staff Liaison
- Developer
permalink: /portfolio/volunteer-committee-draft

---
{% include JB/setup %}
<div id="node-170" class="node node-portfolio node-promoted">
  <div class="content clearfix">
    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even"><p>The Volunteer Committee Draft was started in January 2010 to address the challenges associated with having 3-5 individuals dispassionately and effectively assign ~160 volunteers to ~140 available committee positions. The desirability of turnover in committee members further complicated the decision-making process since there were constantly unknown new volunteers.</p>
<p>The solution was to sort of crowd-source the assignment process. Leaders from all of the committees have the opportunity to "bid" on each of the volunteers. This is faster than the small group process because (1) each leader can quickly rate any uninterested volunteers low, and (2) they do not have to make the final determination of how to assign volunteers, which is the major time-consuming step.</p>
<p>Once bids are collected from all leaders, I had to devise a process to make it fair and reasonable. Here are some of the draft (auto-assignment) requirements:</p>
<ol><li>
		Leaders and returning members should be assigned to their committees and excluded from the draft.</li>
	<li>
		The number of total and available spots is different by committee.</li>
	<li>
		Some committees should receive higher priority due to their relation to the strategic plan or revenue generation.</li>
	<li>
		No committee should strictly take priority over another committee -- losing a first choice should give a committee higher priority for a second choice.</li>
</ol><p>Although some negotiation has been necessary to fine-tune the assignments, the following algorithm has generally been effective:</p>
<ol><li>
		Compute a total number of votes available to a committee based on their priority and percentage of seats pre-assigned for leaders and returning members.</li>
	<li>
		Weight bids based on special characteristics. For instance, we want to give some priority to new volunteers.</li>
	<li>
		Normalize the bids based on the total remaining number of votes.</li>
	<li>
		The highest bid is granted, and the volunteer is assigned. That committee's total number of votes is decremented. Cancel other bids if the committee is now filled.</li>
	<li>
		Remove bids for the assigned volunteer from other committees. Re-normalize bids for that committee such that other options for those committees are weighted higher.</li>
	<li>
		Repeat steps 3-5 until all committee spots are filled.</li>
</ol><p>While this is an imperfect system, it has evolved over the past few years. Most committees are very close after the algorithm has completed. It enables a larger group to tackle the problem, and it correctly handles 80-90% of the assignments. This allows the group to focus on the 10-20% of the assignments that require some debate.</p>
<p>This assignment information is disclosed to all leaders, which does afford the opportunity to game the system. If a committee leader only rates their preferred selections positively and rate all other volunteers negatively, then they are far more likely to receive them since their votes would not be distributed across their second-tier preferences. Fortunately, it does not become an issue as long as everyone approaches the process in good faith.</p>
<p>The process has been deemed a success by everyone involved in both the current and previous processes.</p>
</div></div></div>  </div>
</div>
