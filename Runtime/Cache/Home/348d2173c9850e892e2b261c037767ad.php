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
	<ul>
	<li><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#Current MCM contributors">Current MCM contributors</a>
</font></li><li><font size="4"><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#Previous MCM contributors">Previous MCM contributors</a>
</font></font></li><li><font size="4"><font size="4"><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#IUPAC-MCM link">IUPAC-MCM link</a>
</font></font></font></li><li><font size="4"><font size="4"><font size="4"><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#ACCENT international MCM advisory panel">ACCENT international MCM advisory panel</a>
</font></font></font></font></li><li><font size="4"><font size="4"><font size="4"><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#Associated advisors">Associated advisors</a>
</font></font></font></font></li><li><font size="4"><font size="4"><font size="4"><font size="4"><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/contributors.htt#CRI contributors">CRI contributors</a>

<hr>

<h3><a name="Current MCM contributors">Current MCM contributors</a></h3>

	<p>The following are currently contributing to the MCM through mechanism construction activities or activities to improve the MCM facility (e.g., tool development).</p>
	<ul>
	<li>Andrew Rickard (University of York)</li>
	<li>Jenny Young (University of Leeds)</li>
	<li>Mike Pilling (University of Leeds)</li>
	<li>Mike Jenkin (Atmospheric Chemistry Services)</li>
	<li>Stephen Pascoe (British Atmospheric Data Centre)</li>
	<li>Sam Saunders (University of Western Australia)</li>
	</ul>
	<hr>
	<h3><a name="Previous MCM contributors">Previous MCM contributors</a></h3>
	<ul>
	<li>Nic Carslaw  (University of Leeds)</li>
	<li>Claire Bloss  (University of Leeds)</li>
	<li>Volker Wagner  (University of Leeds)</li>
	<li>Sean Lam  (University of Western Australia)</li>
	</ul>
	<hr>
	<h3><a name="IUPAC-MCM link">IUPAC-MCM link</a></h3>
	<p>See dedicated <a href="http://iupac.pole-ether.fr/projects.html"> page</a>
	</p><hr>
	<h3><a name="ACCENT international MCM advisory panel">ACCENT international MCM advisory panel</a></h3>
	<ul>
	<li>Roger Atkinson (UCRiverside)</li>
	<li>Tony Cox (Cambridge)</li>
	<li>Jens Hjorth (JRC Ispra)</li>
	<li>Mike Jenkin (Atmospheric Chemistry Services)</li>
	<li>Wahid Mellouki (CNRS Orleans)</li>
	<li>Mike Pilling (University of Leeds)</li>
	<li>Andrew Rickard (University of York)</li>
	<li>Luc Vereecken (Leuven)</li>
	<li>Tim Wallington (Ford Dearborn)</li>
	</ul>
	<hr>
	<h3><a name="Associated advisors">Associated advisors</a></h3>
	<p>The following are acknowledged for provision of additional guidance and structured feedback on MCM development and performance:</p>
	<ul>
	<li>Dick Derwent (rdscientific)</li>
	<li>Ian Barnes (University of Wuppertal)</li>
	<li>Georges LeBras (CNRS Orleans)</li>
	<li>George Marston (University of Reading)</li>
	<li>Paulo de Pinho and Casimiro Pio (University of Aveiro)</li>
	<li>Judit Zador and Tam·s Tur·nyi  (Eˆtvˆs University, Budapest) </li>
	<li>Jozef Peeters (University of Leuven)</li>
	<li>Jean-FranÁois M¸ller (Belgian Institute for Space Aeronomy)</li>
	<li>Dave Simpson (MET Norway, Oslo and Chalmers, Gothenburg)</li>
	</ul>
	<hr>
	<h3><a name="CRI contributors">CRI contributors</a></h3>
	<p>The following are acknowledged for contributions to the development of version 2 of the CRI mechanism:</p>
	<ul>
	<li>Mike Jenkin (Atmospheric Chemistry Services)</li>
	<li>Laura Watson (University of Bristol)</li>
	<li>Steven Utembe (University of Bristol)</li>
	<li>Dudley Shallcross (University of Bristol)</li>
	</ul>
	</font></font></font></font></li></ul></div><font size="4"><font size="4"><font size="4">
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
						//Êü•ËØ¢È°µÈù¢
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
			 * Ê∑ªÂä†ÊòæÁ§∫
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
								$("input[class='addMarks'][tag='"+d[i]+"']").val('Unmark');//browse.htmlÈ°µÈù¢
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