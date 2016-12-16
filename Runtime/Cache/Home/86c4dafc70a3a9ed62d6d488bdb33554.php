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
		<div class="searchResults">
			<h3>Search Results for <span id="result_q"></span></h3>
    		<span>Number of matches: <span id="total">0</span></span>
			<div id="result_content"></div>


			<script type="text/javascript">
				function toggleContent() {
					// Get the DOM reference
					var contentId = document.getElementById("searchResults");
					// Toggle
					contentId.style.display == "block" ? contentId.style.display = "none" :
							contentId.style.display = "block";
				}
			</script>

			<a href="#" onclick="toggleContent();">Show as list</a>
			<div id="searchResults" style="display:none;">
				<div>
					C2H5O<br>C2H5O2<br>C2H5OH<br>C2H5OOH<br>

				</div>
			</div>
		</div>

    <h3>Search</h3>
    <table>
      <tbody><tr>
	<td valign="top">
	  <!--<form method="POST" action="javascript:void(0);">-->
	    <div>
	      <p>
	      <a href="http://mcm.leeds.ac.uk/MCMv3.3.1/search.html?applet=1">Draw Structure</a>(Java required)
	      </p>
	      Enter Search Term<br>
	      <input value="" type="text" name="q" id="q">
	      <input type="button" id="search" value="search"><br>
		  
	    </div>
	    
	  <!--</form>-->
	  <p><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/mass_search.html">Molecular weight search</a></p>
	  <p><a href="http://mcm.leeds.ac.uk/MCMv3.3.1/advanced_search.html">Advanced Search</a></p>
	</td>
	<td class="searchComment">
	  <p>Search by MCM name, <a href="http://www.daylight.com/dayhtml/smiles/">SMILES</a> string, <a href="http://www.daylight.com/dayhtml/doc/theory/theory.smarts.htmlSMARTS"></a> pattern, <a href="http://www.iupac.org/inchi/">InChI</a> or draw your strucutre, click the link to start the applet (Java required). The search function returns both full and partial matches.</p>
	</td>
      </tr>
	  
    </tbody>
	</table>
		<style style="text/css">
			.searchResults{display:none;}
		</style>


		<script type="text/javascript">
			$(function (){
				var mainPanel = $('body');
				var search = function() {};
				search.prototype = {
					init: function() {
						this.eventProxy();
					},
					eventProxy: function() {
						var self = this;
						mainPanel.on('click','#search,.pageSearch',function(e) {
							e.stopPropagation();
							self.list();
						});
					},
					list: function() {
						var url = "<?php echo U('/Home/Main/search_result');?>";
						var q = $("#q").val();
						var render = function (d){
							$("#result_q").html(q);
							$("#total").html(d.total);
							if(d.total > 0){
								var data = d.data;
								var total = d.total;
								var h = '';
								if(total >= 2){
									for(var i=1;i<=data.length;i=i+2){
										var page = i-1;
										page = page > 0 ? page : 1;
										h += '<span>\
												<a href="javascript:void(0);" class="pageSearch" tag="'+i+'">'+page+'</a>\
										 </span>';
									};
								}

								h += '<ul>';
								for(var i=0;i<data.length;i++){
									if(data[i].is_sel == 1){
										var m = 'Unmark';
									}else{
										var m = 'Mark';
									}
									h += '<li>\
												<table>\
													<tbody>\
															<tr>\
																<td class="species">\
																<a href="browse.html?species='+data[i].c_chemicals+'">\
																	<img src="/Public/images/'+data[i].c_img+'" style="width:30px;height:30px;"><br>\
																	<span>'+data[i].c_chemicals+'</span>\
																</a>\
																<form action="" method="post">\
																	<input value="'+data[i].c_chemicals+'" type="hidden" name="marks" checked="checked">\
																	<input type="button" value="'+m+'" class="addMarks searchBtn" tag="'+data[i].c_chemicals+'">\
																</form>\
																</td>\
															</tr>\
													</tbody>\
												</table>\
											</li>';
								}
								h += '</ul>';
								$("#result_content").html(h);
							}else{
								$("#result_content").html('No result!');
							}
						}
						$("#result_content").html('Searching...');
						$(".searchResults").show();
						if(q){
							var page = $(this).attr('tag');
							if(!page){
								page = 1;
							}
							var sendData = {'q':q,'page':page};
							Base.goAjax(url,sendData,render);
						}
					}
				}

				new search().init();
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