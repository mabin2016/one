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


<h1>Download MCM model input files</h1>



<p>This archive contains ASCII files of the MCM code in FACSIMILE format. </p>

<ul>
  <li>Users may experience some difficulties in trying to run these codes depending 
    on the version of FACSIMILE they are using. </li>
  <li>The models have been tailored specifically for FACSIMILE version 3.05 (23.12.1993).</li>
  <li>With the later versions of FACSIMILE for windows, some changes need to be 
    made to the code. These include specifically the command functions EXEC (now 
    EXECUTE) and PSTREAM (now SETPSTREAM).</li>
  <li>Users should contact the distributors of <a href="http://www.mcpa-software.com/">FACSIMILE (http://www.mcpa-software.com/)</a> 
     in case of major difficulty, 
    as we can not provide information on updates to the FACSIMILE program which 
    prevent it from running FACSIMILE code written for an earlier version.</li>
  <li>The output files generated at present contain diagnostics and complete variable 
    listings, and are very large. Hence, users are advised to customize these 
    models with respect to the output that they require, and also to consider 
    the overall time scale and time steps for the integrations which are currently 
    set. </li>
</ul>

<hr>

      <ul>
	<li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download.htt#MCM31">Version 3.1</a>.</li>
	<li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download.htt#MCM30">Version 3.0</a>.</li>
	<li><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download.htt#MCM20">Version 2.0</a>.</li>
      </ul>
	  

<hr>
<p><a name="MCM31"><b>MCMv3.1 files</b></a> have been prepared for UNIX and PC users, and stored in 
  compressed form.</p>
<p>Latest corrected versions of mcm31*.fac stored January 2010: <br> Some minor corrections have been made to the alpha-pinene scheme </p>
<p>Select from below according to your hardware type.</p>
<table width="50%" border="0">
  <tbody><tr> 
    <td width="14%"><b>PC:</b> </td>
    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/MCM31boxv2.zip">MCM31boxv21.zip</a> </td>
  </tr>
  <tr> 
    <td width="14%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="14%"><b>UNIX:</b></td>
    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/MCM31boxv21.tar.gz">MCM31box.tar.gz</a> </td>
  <!--  <td width="28%"><a href="download/MCM31boxv2.tar.Z">MCM31box.tar.Z</a> </td> -->
  </tr>
</tbody></table>
<p>Once uncompressed, the archive contains two files. 
</p><dl> 
  <dt><b>MCM31box.fac</b> </dt>
  <dd>Provides a FACSIMILE deck implementing the Master Chemical Mechanism v3.1
    with a basic initialisation using typical concentrations of the photochemically-labile 
    species at the ppb or so level. These initial concentrations have no particular 
    significance and provided solely to implement the MCMv3.1 in the simplest 
    realistic way. </dd>
  <dt><b>MCM31ptm.fac</b></dt>
  <dd>A FACSIMILE deck with the full photochemical 5 day trajectory model for 
    northwest Europe. Details of the model are included with the code and also 
    described in references <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htt#derwent_1996">[Derwent et al. 1996]</a> and<a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htt#derwent_1998"> 
    [Derwent et al. 1998]</a>.</dd>
  <dt>&nbsp;</dt>
  <hr>

<p><a name="MCM30"><b>MCMv3 files</b></a> have been prepared for UNIX and PC users, and stored in 
  compressed form.</p>
<p>Latest corrected versions of mcm3*.fac stored May 2003: <br> 
</p><p>Select from below according to your hardware type.</p>
<table width="50%" border="0">
  <tbody><tr> 
    <td width="14%"><b>PC:</b> </td>
    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/MCM3box.zip">MCM3box.zip</a> </td>
  </tr>
  <tr> 
    <td width="14%">&nbsp;</td>
    <td width="21%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
  </tr>
  <tr> 
    <td width="14%"><b>UNIX:</b></td>
    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/MCM3box.tar.gz">MCM3box.tar.gz</a> </td>
    <td width="28%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/MCM3box.tar.Z">MCM3box.tar.Z</a> </td>
  </tr>
</tbody></table>
<p>Once uncompressed, the archive contains two files. 
</p><dl> 
  <dt><b>MCM3box.fac</b> </dt>
  <dd>Provides a FACSIMILE deck implementing the Master Chemical Mechanism v3.0 
    with a basic initialisation using typical concentrations of the photochemically-labile 
    species at the ppb or so level. These initial concentrations have no particular 
    significance and provided solely to implement the MCM v3.0 in the simplest 
    realistic way. </dd>
  <dt><b>MCM3ptm.fac</b></dt>
  <dd>A FACSIMILE deck with the full photochemical 5 day trajectory model for 
    northwest Europe. Details of the model are included with the code and also 
    described in references <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htt#derwent_1996">[Derwent et al. 1996]</a> and<a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htt#derwent_1998"> 
    [Derwent et al. 1998]</a>.</dd>
  <dt>&nbsp;</dt>


</dl>
<hr>
<p><a name="MCM20"><b>MCMv2.0 files</b></a> have been prepared for UNIX and PC users, and stored in 
  compressed form.</p>

<p>Latest corrected versions of mcm2*.fac stored January 2001.</p>



<p>Select from below according to your hardware type.</p>



<table width="50%" border="0">

  <tbody><tr> 

    <td width="14%"><b>PC:</b> </td>

    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/mcm2box.zip">mcm2box.zip</a> 

    </td>

  </tr>

  <tr> 

    <td width="14%">&nbsp;</td>

    <td width="21%">&nbsp;</td>

    <td width="28%">&nbsp;</td>

  </tr>

  <tr> 

    <td width="14%"><b>UNIX:</b></td>

    <td width="21%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/mcm2box.tar.gz">mcm2box.tar.gz</a> 

    </td>

    <td width="28%"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/download/mcm2box.tar.Z">mcm2box.tar.Z</a> 

    </td>

  </tr>

</tbody></table>



<p>Once uncompressed, the archive contains three files. 

</p><dl> 

  <dt><b>MCM2box.fac</b> </dt>

  <dd>Provides a FACSIMILE deck implementing the Master Chemical Mechanism v2.0 

    with a basic initialisation using typical concentrations of the photochemically-labile 

    species at the ppb or so level. These initial concentrations have no particular 

    significance and provided solely to implement the MCM v2.0 in the simplest 

    realistic way. </dd>

  <dt><b>MCM2cal.fac</b> </dt>

  <dd>Provides a FACSIMILE deck with an initialisation which represents the typical 

    conditions found in the USA. It represents the average conditions in terms 

    of initial concentrations, emissions, boundary layer depths, temperatures 

    and humidities from 40 EKMA OZIPR trajectory model experiments covering all 

    the major ozone exceeding air basins. Again the run is meant to be illustrative 

    and covers the conditions appropriate to the intense urban scale photochemical 

    ozone formation associated with the North American continent.</dd>

  <dt><b>MCM2ptm.fac</b></dt>

  <dd>A FACSIMILE deck with the full photochemical 5 day trajectory model for 

    northwest Europe. Details of the model are included with the code and also 

    described in references <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htm#derwent_1996">[Derwent et al. 1996]</a> and<a href="http://mcm.leeds.ac.uk/MCMv3.3.1/references.htm#derwent_1998"> 

    [Derwent et al. 1998]</a>.</dd>

</dl>


</dl></div>
    
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