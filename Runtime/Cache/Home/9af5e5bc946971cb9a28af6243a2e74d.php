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


<h2>Related work</h2>

<p>Information on some other projects related to atmospheric chemistry, carried 
  out in Leeds can be found here :- </p>

<ul>
  <li><a href="http://www.chem.leeds.ac.uk/research/groups/atmospheric-and-planetary-chemistry.html"><font size="4">Atmospheric 
    chemistry at Leeds</font></a>
	</li>
 <!-- <li><font size="4"><a HREF="http://www.chem.leeds.ac.uk:80/Atmospheric/Field/field.html"> 
    Atmospheric chemistry field studies</a></font><br>
  </li>-->
</ul>



<p>&nbsp; 
</p><ul>
  <li><a href="http://www.naei.org.uk/"><font size="4">UK National Atmospheric Emissions Inventory</font></a></li>
  <li><a href="http://www.airquality.co.uk/"><font size="4">UK National Air Quality Information Archive</font></a></li>
  <!--<li><a href="http://www.gsf.de/eurotrac"><font size="4">EUROTRAC</font></a></li>
  <li><font size="4"><a href="http://www.chem.leeds.ac.uk/EXACT/">EXACT 
    project</a> </font></li>-->
  <li><font size="4"><a href="http://iupac.pole-ether.fr/">IUPAC kinetics 
    database</a></font></li>
  <li><font size="4"><a href="http://jpldataeval.jpl.nasa.gov/">JPL evaluated 
    data</a> </font></li>
  <li><font size="4"><a href="http://www.meto.gov.uk/">The UK MET office</a> </font></li>
  <li><font size="4">The UK department for environment, food and rural affairs 
    <a href="http://www.defra.gov.uk/">(DEFRA)</a> </font></li>
  <li><font size="4">Co-operative Programme for Monitoring and Evaluation of the 
    Long-Range Transmission of Air Pollutants in Europe <a href="http://www.emep.int/">(EMEP)</a> 
    </font></li>
  <li><font size="4"><a href="http://www.egu.eu/">The European Geophysical 
    Union</a> </font></li>
  <li><font size="4"><a href="http://www.epa.gov/">US Environmental Protection 
    Agency</a> (EPA</font>) </li>
<!--  <li><font size="4">Atmospheric chemistry at the Bergische <a href="http://www.physchem.uni-wuppertal.de/">Universit�t 
    Wuppertal Germany</a> </font></li>-->
  <!--<li><font size="4"><a href="http://airsite.unc.edu/">Airsite</a> at the University 
    of North Carolina</font></li>-->
  <li><font size="4">Centre for Atmospheric chemistry, <a href="http://www.cac.yorku.ca/">York 
    University, Toronto</a>, Canada </font></li>
  <li><font size="4">Division of Atmospheric research at <a href="http://www.dar.csiro.au/">CSIRO 
    Australia</a> </font></li>
  <li><font size="4">The Royal Society of Chemistry</font>, <a href="http://www.rsc.org/Membership/Networking/InterestGroups/Environmental/index.asp?e=1"><font size="4">environmental 
    chemistry group </font></a></li>
  <li><font size="4"><a href="http://seawifs.gsfc.nasa.gov/SEAWIFS.html">NASA 
    SeaWiFS project</a></font> </li>
  <li><font size="4">NASA <a href="https://earthdata.nasa.gov/discipline/atmosphere">atmospheric 
    chemistry data and resources </a></font></li>
  <li><font size="4"><a href="http://visibleearth.nasa.gov/">NASA visible Earth</a> 
    </font></li>
  <li><font size="4">NOAA Hybrid Single-Particle Lagrangian Integrated Trajectory 
    (<a href="http://www.arl.noaa.gov/ready/hysplit4.html">HYSPLIT</a>) Model</font> 
  </li>
  <li><font size="4">Tropospheric Ultraviolet &amp; Visible Radiation Model (<a href="https://www2.acom.ucar.edu/modeling/tropospheric-ultraviolet-and-visible-tuv-radiation-model">TUV</a>) 
    </font></li>
  <li><font size="4">Stratospheric Processes and Their Role in Climate (<a href="http://www.sparc.sunysb.edu/default.htm">SPARC</a>) 
    data centre </font></li>
  <li><font size="4">ELSEVIER <a href="http://www.sciencedirect.com/science/journal/13522310">atmospheric 
    online</a> </font></li>
</ul>



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