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

      <h3>
	Browsing: <font id="c_name"></font>
	
      </h3>
<!--<div tal:condition="python:mcm.isC5H8(species)"> <h1 align="center"><A 
   HREF="http://mcm.leeds.ac.uk/MCM/popup.htt" 
   onClick="return popup(this, 'notes')">Important MCMv3.3 status announcement</A></h1></div>-->

      <table class="infobox">
	  <tbody>
	  <!--<tr>
		  <th align="left">Molecular weight</th>
		  <td>
			<span class="mass">60.0950</span>
		  </td>
		</tr>
        <tr><th align="left">SMILES</th> 
	  <td>
	    <span class="smiles">CCCO</span>
	  </td>
		</tr>
			<tr><th align="left">Inchi</th>
		  <td>
			<span class="inchi">InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3</span>
			 </td>
		</tr>-->
	   <!-- <tr>
			  <th align="left">External Links:</th>
			  <td>
	      <a href="http://www.google.com/search?q=InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3" class="searchLink" title="Search Google">
		<img src="/Public/browse_files/search.png" alt="Search ">Google</a>
	      <a href="http://www.chemspider.com/Search.aspx?q=InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3" class="searchLink" title="Search ChemSpider">
		<img src="/Public/browse_files/search.png" alt="Search ">ChemSpider</a>
	      <a href="http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?db=pccompound&amp;term=%22InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3%22[inchi]" class="searchLink" title="Search PubChem">
	        <img src="/Public/browse_files/search.png" alt="Search ">PubChem
	      </a>
	      <a href="http://webbook.nist.gov/cgi/cbook.cgi?Name=InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3" class="searchLink" title="Search NIST WebBook"><img src="/Public/browse_files/search.png" alt="Search ">NIST WebBook</a>
			 
			 <a href="http://iupac.pole-ether.fr/cgi-bin/Compound.cgi?name=InChI=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3&amp;nameType=InChI" class="searchLink" title="Search IUPAC"><img src="/Public/browse_files/search.png" alt="Search ">IUPAC</a>
			 
			 <a href="http://era-orleans.org/eradb/index.php?fonctionnalite=inchi&amp;inchi=1S/C3H8O/c1-2-3-4/h4H,2-3H2,1H3" class="searchLink" title="Search ERADB"><img src="/Public/browse_files/search.png" alt="Search ">ERADB</a>
			  <a href="http://www.ebi.ac.uk/chebi/advancedSearchFT.do?searchString=InChI=1/C3H8O/c1-2-3-4/h4H,2-3H2,1H3" class="searchLink" title="Search CHEBI"><img src="/Public/browse_files/search.png" alt="Search ">CHEBI</a></td>
			 
			 </tr>-->
	 
	<tr>
	  <th align="left">Synonyms：</th>
	  <td>
		  <div id="Synonyms"></div>
	    <!--<span>
	      1-propanol;
		</span>
		  <span>
	      Propyl alcohol;
            </span><span>
	      propanol;
            </span><span>
	      n-propanol;
            </span><span>
	      Propan-1-ol;
            </span>-->
	  </td>
	</tr>
      </tbody>
	  </table>

		<table class="reactionList" id="reactionList" align="center"></table>
			<script id="reaction-list" type="text/x-handlebars-template">
				<tbody>
				{{#each this}}
					<tr>
						<td>
							<table class="speciesExpr">
								<tbody><tr>
									<td class="species">
										<a>
											<img src="/Public/images/C2H5OH.jpg" style="width:80px;height:40px;"><br>
											{{r_reactant1}}
										</a>
										<input type="button" value="Mark" class="addMarks" tag="{{r_reactant1}}">

									</td>
									<td class="op">+</td>
									<td class="species">
										<a>
											{{r_reactant2}}
										</a>
									</td>
								</tr>
								</tbody></table>
						</td>
						<td>
							<table class="reactionArrow" cellspacing="0" cellpadding="0">
								<tbody><tr>
									<td><table class="body" cellspacing="0" cellpadding="0">
										<tbody><tr>
											<td class="upper">
												<span class="rate">{{r_kt}}</span>
											</td>
										</tr>
										<tr>
										</tr><tr>
											<td class="lower"></td>
										</tr>
										</tbody></table></td>
									<td class="head"><img src="/Public/browse_files/arrowhead.gif" alt="arrowhead"></td>
								</tr>
								</tbody></table>
						</td>
						<td>
							<table class="speciesExpr">
								<tbody><tr>
									<td class="species">
										<a href="browse.html?species={{r_product1}}">
											<img src="C2H5O.png" alt=""><br>
											{{r_product1}}
										</a>
										<form action="#" method="post">
											<input value="{{r_product1}}" type="hidden" name="marks">
											<input value="/browse.html?species={{r_product1}}" type="hidden" name="url">
											<input type="button" value="Mark">
										</form>
									</td>
								</tr>
								</tbody></table>
						</td>
						<td>
							<a href="/Public/doc/C2H5OH.pdf">
								Doc.
							</a>
						</td>
					</tr>
				{{/each}}
				</tbody>
			</script>



	
	 <script type="text/javascript">
function toggleContent() {
  // Get the DOM reference
  var contentId = document.getElementById("reference");
  // Toggle 
  contentId.style.display == "block" ? contentId.style.display = "none" : 
contentId.style.display = "block"; 
}
</script>

	<!--<div><a href="browse.html?species=NPROPOL#" onclick="toggleContent();">Show/Hide References</a></div>
	<div id="reference" style="display:none;">
		<div class="searchResults">
			<table>
				<tbody><tr>
					<td>
						<div>
							IUPAC Datasheet: HOx_VOC25_HO_CH3CH2CH2OH
							<span>[<a href="http://iupac.pole-ether.fr/htdocs/datasheets/pdf/HOx_VOC25_HO_CH3CH2CH2OH.pdf">PDF</a>]</span>
							k: 5.8D-12  Temperature:298
						</div><div>
							IUPAC Datasheet: HOx_VOC25_HO_CH3CH2CH2OH
							<span>[<a href="http://iupac.pole-ether.fr/htdocs/datasheets/pdf/HOx_VOC25_HO_CH3CH2CH2OH.pdf">PDF</a>]</span>
							k: 4.6D-12*EXP(70/TEMP)  Temperature:260&lt;T&lt;380
						</div><div>
							IUPAC Datasheet: X_VOC16_Cl_nC3H7OH
							<span>[<a href="http://iupac.pole-ether.fr/htdocs/datasheets/pdf/X_VOC16_Cl_nC3H7OH.pdf">PDF</a>]</span>
							k: 1.6D-10  Temperature:298
						</div><div>
							IUPAC Datasheet: X_VOC16_Cl_nC3H7OH
							<span>[<a href="http://iupac.pole-ether.fr/htdocs/datasheets/pdf/X_VOC16_Cl_nC3H7OH.pdf">PDF</a>]</span>
							k: 2.7D-11*EXP(525/TEMP)  Temperature:270&lt;T&lt;350
						</div>
					</td>
				</tr>
				</tbody></table>
			</div>
	</div> -->
	
 <script type="text/javascript">
function togglePrecur() {
  // Get the DOM reference
  var contentId = document.getElementById("precur");
  // Toggle 
  contentId.style.display == "block" ? contentId.style.display = "none" : 
contentId.style.display = "block"; 
}
</script>

	<!--<div><a href="browse.html?species=NPROPOL#" onclick="togglePrecur();">Show/Hide Precursors</a></div>-->
	<div id="precur" style="display:none;">

	  <div></div>
    
<div>

</div>
<div class="searchResults">
  <h3>Precursors of <span>NPROPOL</span>
  </h3>
  <span>Number of precursors: <span>1</span></span><br>
	<ul>
	<li>

	  <table>  
			<tbody><tr><td class="precursor">
  <a href="browse.html?species=NC3H7O2">
    
      <img src="/Public/browse_files/NC3H7O2.png" border="0" alt=""><br>

   NC3H7O2
   </a>
  
   <form action="add" method="post">
      <input value="NC3H7O2" type="hidden" name="marks">
      <input value="browse.html?species=NPROPOL" type="hidden" name="url">
      <input type="button" value="Mark">
    </form>
     
  
</td></tr>
			</tbody></table> 
		  </li>
</ul>
  </div>
</div>

	<!--<form method="get" action="cml.py">
		<input value="NPROPOL" type="hidden" name="species">
		<input type="button" value="View CML">
	</form> -->
      

	
      
    </div>

<script type="text/javascript">
	$(function (){
		var Browse = (function() {
			return {
				list : function() {
					var q = Base.queryString('species');
					if(q){
						var url = "<?php echo U('/Home/Main/reaction_list');?>";
						var render = function (res){
							var d = res.data;
							var one = res.data2;//化合物
							if(d.status == 1){
								var source   = $("#reaction-list").html();
								var template = Handlebars.compile(source);
								var html    = template(d.data);
								$("#reactionList").html(html);
								var c_name = one.c_chemicals;
								var syn = '<span>'+one.c_chemicals+'</span>';
								if(one.c_name1) {syn += ',<span>'+one.c_name1+'</span>';}
								if(one.c_name2) {syn += ',<span>'+one.c_name2+'</span>';}
								$("#c_name").html(c_name);
								$("#Synonyms").html(syn);
							}else{
								$("#reactionList").append('<div>No Result!</div>');
							}
						}
						Base.goAjax(url,{'q':q},render);
					}
				}
			}
		}());
		Browse.list();

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