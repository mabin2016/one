<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head><meta htmlp-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/Public/home_files/style.css" rel="stylesheet" type="text/css">
    <link href="/Public/style/style.css" rel="stylesheet" type="text/css">
    <link rel="search" type="application/opensearchdescription+xml" title="Search" href="./opensearch/desc.xml">
    <title>chemistry</title>
	<script src="/Public/home_files/ga.js" type="text/javascript"></script>
	<script src="/Public/js/jquery.min.js" type="text/javascript"></script>
  </head>
  <body>
    <table id="header" cellspacing="0">
      <tbody>
	  <tr>
		<td colspan="1">
		<a href="javascript:void(0);" style="float: right">
				<img src="/Public/home_files/UoY.jpg" class="logo" alt="University of York logo" height="75">
			  </a>
			  <a href="javascript:void(0);" style="float: right">
				<img src="/Public/home_files/ncas_logo.jpg" class="logo" alt="NCAS logo" height="75">
			  </a>
			  <a href="javascript:void(0);" style="float: right">
				<img src="/Public/home_files/leeds_new.gif" class="logo" alt="University
	  of Leeds logo" height="75">
			  </a>
				<h1>The Master Chemical Mechanism</h1>
				<h3 style="margin-left: 3em;">VERSION 1.0</h3>			
				<h5 style="margin-left: 4.4em;"> <a href="javascript:void(0);">site</a></h5>		  
		 </td>
      </tr>
      <tr>
		<td class="searchBar">
		  <form method="GET" action="">
			<input type="text" name="q"><input type="submit" value="search">
		  </form>
		</td>
      </tr>
      <tr>
	<td id="menu" colspan="1">
	  <ul>
	    <li>
	      <a href="<?php echo U('/Home/Index/index');?>" title="Project home page">&nbsp;&nbsp;Home</a>
	    </li>
	    <li>
	      <a href="<?php echo U('roots');?>" title="Find species starting from the primary VOCs">Browse</a> 
	    </li>
	    <li>
	      <a href="<?php echo U('/Home/Index/search');?>" title="Search for species by SMILES string or MCM name">Search</a>
	    </li>
	    <li>
	      <a href="<?php echo U('/Home/Index/extract_data');?>" title="Extract subsets of the MCM">Extract</a>
	    </li>
	    <li>
	      <a href="<?php echo U('/Home/Index/download');?>" title="Download complete box model input files">Download</a>
	    </li>
		<li> <a href="<?php echo U('/Home/Index/project');?>" title="Constant">Constant</a></li>

		<li><a href="<?php echo U('/Home/Index/tutorial_intro');?>" title="AtChem EUROCHAMP Chamber Tutorial">AtChem</a></li>
		<li><a href="<?php echo U('/Home/Index/tools');?>" title="Tools for use with the MCM">Tools</a></li>
		<li>
	      <a href="<?php echo U('/Home/Index/feedback');?>" title="Join the MCM mailing list">Feedback</a>
	    </li>
	    <li><a href="<?php echo U('/Home/Index/links');?>" title="Links to related work">Links</a></li>
	   <li><a href="<?php echo U('/Home/Index/citation');?>" title="Link to citation details">Citation</a></li>
	    <li><a href="<?php echo U('/Home/Index/contributors');?>" title="Link to contributors">Contributors</a></li>
		<li><a href="<?php echo U('/Home/Index/funding');?>" title="Link to funding">Funding</a></li>
 
	 </ul>
	</td>
	
      </tr>
    </tbody>
	</table>

    <div align="center">
	  <form action="" method="post">
			<input value="" type="hidden" name="url">
		  <table class="markList">
			<thead><tr><th colspan="2">Mark List</th></tr></thead>
			<tbody>

				<tr>
						<!--<td>
							<ul>
								<?php if(is_array($marks)): foreach($marks as $key=>$vo): ?><li>
										<input value="<?php echo ($vo); ?>" type="checkbox" name="marks[]">
										<a href="browse.htt?species=<?php echo ($vo); ?>"><?php echo ($vo); ?></a>
									</li><?php endforeach; endif; ?>
							</ul>
						</td>
						<td>
							<input type="submit" name="action" value="Delete" class="button">
							<input type="submit" name="action" value="Clear" class="button">
						</td>-->
						<td id="markList">
							<p>No result.</p>
						</td>

				</tr>
			</tbody>
		  </table>
	  </form>
	</div>

<div id="body">
	  
	<script type="text/javascript">
	<!--
	function popup(mylink, windowname)
	{
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, 'width=1000,height=600,scrollbars=yes');
	return false;
	}
	//-->
	</script>	  


	<h2>Welcome to the MCM website </h2>
		 
      <p>

	The Master Chemical Mechanism (MCM) is a near-explicit chemical mechanism which describes the detailed gas-phase chemical processes involved in the tropospheric degradation of a series of primary emitted volatile organic compounds (VOCs). Currently, the degradation of methane and 142 non-methane VOCs is represented.

      </p>

      <p>

	The MCM was originally developed to provide accurate, robust and up-to-date information concerning the role of specific organic compounds in ground-level ozone formation in relation to air quality policy development in Europe. However, it also provides a research tool for investigating other areas where a detailed representation of the chemistry is required, e.g. the generation of distributions of speciated radical and closed-shell intermediates formed during VOC degradation.

      </p>
<p>
The main intention of this web site is to provide a flexible, easily utilised platform for the MCM that is readily accessed by the research and user communities, and to help promote its development and validation.
</p>
      <hr>


      <table class="detailedMenu" align="center">

	<tbody>

	  <tr>

	    <td width="50%">

	      <h4><a href="./roots.html">Browse the mechanism</a></h4>

	      View the list of primary VOCs from which you can navigate through

	      the mechanism either from reactants to products, or vice-versa.
		<a href="./help.html#browse">Help</a>
	    </td>

	    <td width="50%">

	      <h4><a href="./project.html">Construction methodology</a></h4>

	      Detailed information about the MCM and its history.
		  <a href="./project.html#New_3.3.1">New in MCMv3.3.1</a>

	    </td>

	  </tr>

	  <tr>

	    <td>

	      <h4><a href="./search.html">Search the mechanism</a></h4>

	      Enter a SMILES string or MCM name to jump straight to matching species

	      in the mechanism.
		  <a href="./help.html#search">Help</a>

	    </td>
		
		<td>

	       <h4><a href="./meetings.html">MCM Workshops</a></h4>

	      Information and presentations from the MCM development and user workshops.

	    </td>
	    

	  </tr>

	  <tr>

	    <td>

	      <h4><a href="./extract.html">Extract a subset</a></h4>

	      Select your own list of primary species and extract a complete mechanism

	      for them.  Mechanisms can be viewed as HTML or exported in a range of formats.
		  <a href="./help.html#extract">Help</a>

	    </td>
<td rowspan="2&gt;

	     &lt;h4&gt;Tutorials&lt;/h4&gt;
			
	      Learn more about how to use the MCM.  Tutorials are available on using the MCM with either &lt;a href=">

	     <h4>Tutorials</h4>
			
	      Learn more about how to use the MCM.  Tutorials are available on using the MCM with either <a href="https://atchem.leeds.ac.uk/">AtChem Online</a> or FACSIMILE <br><br>
			<a href="./atchem/tutorial_intro.html">AtChem Online Tutorial</a><br>
			<a href="./tutorial_intro.html">Facsimile Tutorial</a>

	    </td>
	    

	  </tr>

	  <tr>

	    <td>
	      <h4><a href="./download.html">Download</a></h4>

	      FACSIMILE input files for box model and trajectory model runs are available

	      for current and previous versions of the MCM.

	    </td>
		
		<td>
	    </td>
	  </tr>
	  <tr>
	    <td>
	      <h4><a href="./MCMChamber.html">EUPHORE Chamber Simulations</a></h4>

	      Notes on simulating EUPHORE chamber experiments.

	    </td>

	    <td>
			<h4><a href="./citation.html">Citation</a></h4>

			Details of the correct citation for MCM

	    </td>

	  </tr>
	<tr>
	<td>
	      <h4><a href="./tools.html">Tools</a></h4>

	      Various tools for use with the MCM

	    </td>
		<td>
	      <h4><a href="./links.html">Links</a></h4>

	      Useful tropospheric chemistry links.

	    </td>
</tr>
<tr><td>
Access to the Common Representative Intermediates mechanism (CRI v2) via a parallel searchable and extractable facility
</td><td><h4><a href="javascript:void(0);">MCM Archive</a></h4>
Archived website for MCMv3.2
</td></tr>
<tr> <td>
<h4><a href="./feedback.html">Feedback</a></h4>

	      Join the MCM mailing list or contact the maintainers directly.

	    </td></tr>
	</tbody>

      </table>

      <hr>

    </div>
    
<hr>
		<div style="margin: 0.5em; margin-top: 0px;">
		<div style="float: right;">
			<a href="http://www.chemaxon.com/" class="img">
				<img src="./Public/home_files/chemaxon.gif" name="logo" width="100" height="20" border="0" alt="Chemaxon logo">
			</a>
		</div>
      <i>
		<a href="mailto:andrew.rickard@york.ac.uk">Andrew Rickard</a>,
		<a href="mailto:j.c.young@leeds.ac.uk">Jenny Young</a>
      </i>
      <div>[ <a href="#">Admin. page</a> ]</div>
    </div>
	<script src="/Public/js/Base.js" type="text/javascript"></script>
	<script src="/Public/js/handlebars.js" type="text/javascript"></script>
	<script src="/Public/js/index.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function (){
			var mainPanel = $('body');
			var marks = function() {};
			marks.prototype = {
				init: function() {
					this.eventProxy();
					this.list();
				},
				eventProxy: function() {
					var self = this;
					mainPanel.on('click','.addMarks',function(e) {
						e.stopPropagation();
						//查询页面
						if($(this).val() == "Mark"){
							var data = $(this).attr('tag');
							self.add(data);
							$(this).val('Unmark');
						}else if($(this).val() == "Unmark"){
							var data = $(this).attr('tag');
							self.del(data);
							$(this).val('Mark');
						}else{
							var data = $("input[name='marks']:checked").map(function(index,elem) {
								return $(elem).val();
							}).get().join(',');
							self.add(data);
						}
					}).on('click','#clear',function(e) {
						e.stopPropagation();
						self.clear();
					}).on('click','#del',function(e) {
						e.stopPropagation();
						self.del();
					});
				},
				list: function() {
					var url = "<?php echo U('/Home/Index/list_marks');?>";
					var render = function (d){
						Show.unCheck(d);
//						Show.unMark(d);
						Show.append(d);
					}
					Base.goAjax(url,{},render);
				},
				add: function(data) {
					var self = this;
					var url = "<?php echo U('/Home/Index/add');?>";
					var render = function (d){
						if(d.status != -1){
							self.list();
						}else{
							alert("add fail!Please try again.");
						}
					}
					if(data){
						var d = {'marks':data};
						Base.goAjax(url,d,render);
					}
				},
				del: function(data) {
					var self = this;
					var url = "<?php echo U('/Home/Index/del');?>";
					var render = function (d){
						if(d.status != -1){
							self.list();
							location.reload();
						}else{
							alert("del fail!Please try again.");
						}
					}
					if(!data){
						var data = $("input:checkbox[name='topMarks']:checked").map(function(index,elem) {
							return $(elem).val();
						}).get().join(',');
					}
					if(data){
						var d = {'marks':data};
						Base.goAjax(url,d,render);
					}
				},
				clear: function() {
					var self = this;
					var url = "<?php echo U('/Home/Index/clear');?>";
					var render = function (d){
						if(d.status == 1){
							self.list();
						}else{
							alert('clear fail!Please try again.');
						}
					}
					Base.goAjax(url,{},render);
				}
			}

			/**
			 * 添加显示
			 * @param d
             */
			var Show = (function() {
				return {
					unCheck:function (){
						$("input[name='marks']").prop("checked", false);
					},
					append : function(d) {
						if(d){
							var h = '<ul>';
							for(var i in d){
								h += '<li>\
											<input value="'+d[i]+'" type="checkbox" name="topMarks" class="topMarks">\
											<a href="browse.htt?species='+d[i]+'">'+d[i]+'</a>\
									</li>';
								$("input[name='marks'][value='"+d[i]+"']").prop("checked", true);
								$("input[class='addMarks'][tag='"+d[i]+"']").val('Unmark');//browse.html页面
							}
							h  += '</ul>';
							var ap = '<td class="btnAction">\
									<input type="button" name="action" value="Delete" class="button" id="del">\
									<input type="button" name="action" value="Clear" class="button" id="clear">\
								 </td>';
							$(".btnAction").remove();
							$("#markList").html(h);
							$("#markList").after(ap);
						}else{
							$(".btnAction").remove();
							$("#markList").html('<p>No result.</p>');
						}
					}
				}
			}());

			var p1=new marks().init();
		});
	</script>

</body>

</html>