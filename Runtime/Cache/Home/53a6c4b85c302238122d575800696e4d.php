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


<!--<h1 align="center"><A 
   HREF="http://mcm.leeds.ac.uk/MCM/popup.htt" 
   onClick="return popup(this, 'notes')">Important MCMv3.3 status announcement</A></h1>  -->       
      <h3>Extract Sub-Mechanisms</h3>

      <p>
	You can extract a subset of the MCM using your mark list as
	the set of primary species.  All subsequent reactions and
	species will be included in the mechanism.
      </p>
      <form method="post" action="<?php echo U('/Home/Index/extract_list');?>">
	<p><b>
	  Select the format in which you would like to generate the sub-mechanism:</b>
	</p>
	<input type="radio" name="format" value="html-mcm" checked="yes">
	HTML, displaying MCM species names.
	<br>
	<input type="radio" name="format" value="html-smiles">
	HTML, displaying SMILES strings.
	<br>
	<input type="radio" name="format" value="facsimile">
	FACSIMILE input format, suitable for inserting into a FACSIMILE model.
	<br>
	<input type="radio" name="format" value="fortran">
	FORTRAN format, suitable for use with a FORTRAN numerical integrator.
<br>
    Download the files needed to convert existing FACSIMILE files to FORTRAN compatible format or experimental KPP format.<br>
 <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/fortran_convertor.zip"> FORTRAN converter zip file </a> 
  	<br>
<!--	<input type="radio" name="format" value="fortran2">
	FORTRAN format, suitable for use with a FORTRAN numerical integrator (includes inorganic reactions).
 

	<br> -->
	<input type="radio" name="format" value="xml">
	XML, experimental XML format.
	<br>
	View the Schema <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/mechanism.xsd"> mcm.xsd </a> against which the XML file can be validated.
	<br>
	<input type="radio" name="format" value="kpp">
	KPP, experimental KPP format.

	<br>
	<input type="radio" name="format" value="Fac-Meta">
	FACSIMILE with RDF metadata, experimental (CM).
	
	<br>
	<input type="radio" name="format" value="Mol-Weight">
	Molecular Weights for all species in a subset.
<!--<br>
    Download the a FORTRAN file containing the rate coefficient data.<br>
 <A href="kpp_constants.f90"> Constants FORTRAN file. </A> 
-->
	<br>
	<br>
	<p> <b>Select which options you require:</b></p>
	<input type="checkbox" name="inorganic" value="yes">Include inorganic reactions?<br>
<input type="checkbox" name="generic" value="yes">Include generic rate coefficients?  FACSIMILE, FORTRAN and KPP formats only<br>
	<p><b>
	  Click below to generate the sub-mechanism.</b>
	</p>
	<input type="submit" value="Extract">
   </form>
      
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