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


 <h1><b>MCM/AtChem Online Tutorial</b></h1>
 
 <h3><i>By J. C. Young, A. R. Rickard, K. Boro��ska and M. J. Pilling</i></h3>
 <p><i>With thanks to C. Martin and R. Sommariva</i></p>

<h2><b>Introduction</b></h2>
<p> The Master Chemical Mechanism (MCM) is based on the original protocol devised by Jenkin et al. in 1997, which has 
subsequently been updated and improved (Saunders et al., 2003; Jenkin et al., 2003).  The MCM can be easily 
navigated and downloaded (in a variety of formats, either in full or subsets of the mechanism) from the 
<a href="http://mcm.leeds.ac.uk/MCM-devel/" target="_blank"> MCM website</a>.</p>

<p><b><a href="https://atchem.leeds.ac.uk/">AtChem on�line</a></b> is a modelling tool designed for running simulations of the Master Chemical Mechanism using just your web browser, no installation is required. 
The user needs only to supply two files: one with the chemical reactions (extracted directly from the MCM) and one with the initial concentrations, changing the other parameters if necessary 
and press �Submit&#65533;. A link to a zip file with the results should then be available to dowload.</p>

<p>Currently there is one login for everyone &#65533; this will be changed in the future and users will need to register to receive an individual login. 
Until then, remember that everyone can access your data.</p>

<p>The following tutorial contains a variety of exercises designed to demonstrate all the features of <b>AtChem Online</b> by using
 the Master Chemical Mechanism in the context of environmental chamber studies. The tutorial consists of:</p>
<ol>
<li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec1.htt">Introduction to the use of <b>AtChem Online</b>.</a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec2.htt">Using AtChem with the MCM.</a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec3.htt">Importance of chamber specific auxiliary mechanisms.</a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec4.htt">Chamber modelling of aromatic system using MCMv3.1.</a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec5.htt">Simulation of a PSI 1,3,5-trimethylbenzene Experiment </a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec6.htt">References</a>
</li><li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec7.htt">Answers and discussion</a>
</li></ol>

<p> To complete this tutorial you will only need a web browser, a program such as word pad or notepad to view and edit 
input files and a spreadsheet package such as MS Excel for processing the model output</p>

<p>Most of the exercises are based on real data from chamber studies carried out at out various <a href="http://www.eurochamp.org/" target="_blank">EUROCHAMP2</a> facilities.  For more information please visit the <a href="http://mcm.leeds.ac.uk/MCM/">main MCM website</a>.  For questions on this tutorial and the MCM in general and to keep updated on recent development and improvements please subscribe to the <a href="http://mcm.leeds.ac.uk/MCM/feedback.htt">mailing list</a>.</p>

<a href="http://mcm.leeds.ac.uk/MCMv3.3.1/atchem/tutorial_sec1.htt">Next</a><br>




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