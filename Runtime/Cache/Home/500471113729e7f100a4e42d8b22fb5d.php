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
		<h2>Mechanism subset for marked species</h2>
		<p>
			Each product species is linked to the point in the subset where that species
			reacts.  Select "Goto MCM" next to the first occurance of each reactant to browse
			the MCM from that point.
		</p>
		<table class="subset">
			<tbody>
			<tr class="organic-tr">
				<td></td>
				<td>O</td>
				<td>→</td>
				<td>O3</td>
				<td>5.6D-34*N2*(TEMP/300)@-2.6*O2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O</td>
				<td>→</td>
				<td>O3</td>
				<td>6.0D-34*O2*(TEMP/300)@-2.6*O2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O + O3</td>
				<td>→</td>
				<td></td>
				<td>8.0D-12*EXP(-2060/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O + NO</td>
				<td>→</td>
				<td>NO2</td>
				<td>KMT01</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O + NO2</td>
				<td>→</td>
				<td>NO</td>
				<td>5.5D-12*EXP(188/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O + NO2</td>
				<td>→</td>
				<td>NO3</td>
				<td>KMT02</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O1D</td>
				<td>→</td>
				<td>O</td>
				<td>3.2D-11*EXP(67/TEMP)*O2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O1D</td>
				<td>→</td>
				<td>O</td>
				<td>2.0D-11*EXP(130/TEMP)*N2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO + O3</td>
				<td>→</td>
				<td>NO2</td>
				<td>1.4D-12*EXP(-1310/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO2 + O3</td>
				<td>→</td>
				<td>NO3</td>
				<td>1.4D-13*EXP(-2470/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO + NO</td>
				<td>→</td>
				<td>NO2 + NO2</td>
				<td>3.3D-39*EXP(530/TEMP)*O2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO + NO3</td>
				<td>→</td>
				<td>NO2 + NO2</td>
				<td>1.8D-11*EXP(110/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO2 + NO3</td>
				<td>→</td>
				<td>NO + NO2</td>
				<td>4.50D-14*EXP(-1260/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO2 + NO3</td>
				<td>→</td>
				<td>N2O5</td>
				<td>KMT03</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O1D</td>
				<td>→</td>
				<td>OH + OH</td>
				<td>2.14D-10*H2O</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + O3</td>
				<td>→</td>
				<td>HO2</td>
				<td>1.70D-12*EXP(-940/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + H2</td>
				<td>→</td>
				<td>HO2</td>
				<td>7.7D-12*EXP(-2100/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + CO</td>
				<td>→</td>
				<td>HO2</td>
				<td>KMT05</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + H2O2</td>
				<td>→</td>
				<td>HO2</td>
				<td>2.9D-12*EXP(-160/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + O3</td>
				<td>→</td>
				<td>OH</td>
				<td>2.03D-16*(TEMP/300)@4.57*EXP(693/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + HO2</td>
				<td>→</td>
				<td></td>
				<td>4.8D-11*EXP(250/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + HO2</td>
				<td>→</td>
				<td>H2O2</td>
				<td>2.20D-13*KMT06*EXP(600/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + HO2</td>
				<td>→</td>
				<td>H2O2</td>
				<td>1.90D-33*M*KMT06*EXP(980/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + NO</td>
				<td>→</td>
				<td>HONO</td>
				<td>KMT07</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + NO2</td>
				<td>→</td>
				<td>HNO3</td>
				<td>KMT08</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + NO3</td>
				<td>→</td>
				<td>HO2 + NO2</td>
				<td>2.0D-11</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + NO</td>
				<td>→</td>
				<td>OH + NO2</td>
				<td>3.45D-12*EXP(270/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + NO2</td>
				<td>→</td>
				<td>HO2NO2</td>
				<td>KMT09</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + HO2NO2</td>
				<td>→</td>
				<td>NO2</td>
				<td>3.2D-13*EXP(690/TEMP)*1.0</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2 + NO3</td>
				<td>→</td>
				<td>OH + NO2</td>
				<td>4.0D-12</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + HONO</td>
				<td>→</td>
				<td>NO2</td>
				<td>2.5D-12*EXP(260/TEMP)</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + HNO3</td>
				<td>→</td>
				<td>NO3</td>
				<td>KMT11</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O + SO2</td>
				<td>→</td>
				<td>SO3</td>
				<td>4.0D-32*EXP(-1000/TEMP)*M</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>OH + SO2</td>
				<td>→</td>
				<td>HSO3</td>
				<td>KMT12</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HSO3</td>
				<td>→</td>
				<td>HO2 + SO3</td>
				<td>1.3D-12*EXP(-330/TEMP)*O2</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HNO3</td>
				<td>→</td>
				<td>NA</td>
				<td>6.00D-06</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>N2O5</td>
				<td>→</td>
				<td>NA + NA</td>
				<td>4.00D-04</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>SO3</td>
				<td>→</td>
				<td>SA</td>
				<td>1.20D-15*H2O</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O3</td>
				<td>→</td>
				<td>O1D</td>
				<td>J&lt;1&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>O3</td>
				<td>→</td>
				<td>O</td>
				<td>J&lt;2&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>H2O2</td>
				<td>→</td>
				<td>OH + OH</td>
				<td>J&lt;3&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO2</td>
				<td>→</td>
				<td>NO + O</td>
				<td>J&lt;4&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO3</td>
				<td>→</td>
				<td>NO</td>
				<td>J&lt;5&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>NO3</td>
				<td>→</td>
				<td>NO2 + O</td>
				<td>J&lt;6&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HONO</td>
				<td>→</td>
				<td>OH + NO</td>
				<td>J&lt;7&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HNO3</td>
				<td>→</td>
				<td>OH + NO2</td>
				<td>J&lt;8&gt;</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>N2O5</td>
				<td>→</td>
				<td>NO2 + NO3</td>
				<td>KMT04</td>
			</tr>
			<tr class="organic-tr">
				<td></td>
				<td>HO2NO2</td>
				<td>→</td>
				<td>HO2 + NO2</td>
				<td>KMT10</td>
			</tr>




			<!--<tr>
				<td><a name="CH3OH" href="/browse.htt?species=CH3OH">Goto MCM</a></td>
				<td>CH3OH + OH</td>
				<td>→</td>
				<td>HO2 + <a href="#HCHO">HCHO</a></td>
				<td>2.85D-12*EXP(-345/TEMP)</td>
			</tr>
			<tr>
				<td><a name="HCHO" href="/browse.htt?species=HCHO">Goto MCM</a></td>
				<td>HCHO</td>
				<td>→</td>
				<td>CO + HO2 + HO2</td>
				<td>J&lt;11&gt;</td>
			</tr>
			<tr>
				<td></td>
				<td>HCHO</td>
				<td>→</td>
				<td>H2 + CO</td>
				<td>J&lt;12&gt;</td>
			</tr>
			<tr>
				<td></td>
				<td>NO3 + HCHO</td>
				<td>→</td>
				<td>HNO3 + CO + HO2</td>
				<td>5.5D-16</td>
			</tr>
			<tr>
				<td></td>
				<td>OH + HCHO</td>
				<td>→</td>
				<td>HO2 + CO</td>
				<td>5.4D-12*EXP(135/TEMP)</td>
			</tr>
			</tbody>

			<tfoot>
			<tr>
				<td colspan="5">
					No. of Organic Species = 2, No. of Reactions = 53
				</td>
			</tr>-->

			</tfoot>
		</table>

	</div>

	<input type="hidden" name="inorganic" value="<?php echo ($inorganic); ?>" />
	<input type="hidden" name="generic" value="<?php echo ($generic); ?>" />

<style type="text/css">
	.organic-tr{display: none;}
</style>
<script type="text/javascript">
	$(function (){
		var inorganic = $("input[name='inorganic']").val();
		if(inorganic == "yes"){
			$(".organic-tr").show();
		}
		var Extract = (function() {
			return {
				list : function() {
					var url = "<?php echo U('/Home/Main/get_reaction');?>";
					var render = function (data){
						if(data){
							var url2 = "<?php echo U('/Home/Index/browse');?>";
							var h = '';
							for(var i in data){
								h += '<tr><td>';
								if(data[i].is_sel == 1){
									h += '<a name="'+data[i].r_reactant1+'" href="'+url2+'?species='+data[i].r_reactant1+'">Goto MCM</a>';
								}
								h += '</td><td>';
								h += data[i].r_reactant1;
								if(data[i].r_reactant2){
									h += ' + '+data[i].r_reactant2;
								}
								if(data[i].r_reactant3){
									h += ' + '+data[i].r_reactant3;
								}
								h += '</td><td>→</td><td>'+data[i].r_product1;
										if(data[i].r_product2){
											h += ' + '+data[i].r_product2;
										}
										if(data[i].r_product3){
											h += ' + '+data[i].r_product3;
										}
								h += '</td><td>'+data[i].r_kt+'</td></tr>';
							}
							$(".organic-tr").last().after(h);
						}
					}
					Base.goAjax(url,{},render);
				}
			}
		}());
		Extract.list();
	});
</script>
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