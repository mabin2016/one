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

     <!-- <h3>Generic rate parameters</h3>

     	  <li><a href="/MCMv3.3.1/parameters/complex.html">Complex rate coefficients</a></li>
	  <li><a href="/MCMv3.3.1/parameters/simple.html">Simple rate coefficients</a></li>
        <li><a href="/MCMv3.3.1/parameters/photolysis.html">Photolysis rates</a></li>
	-->
      <h3>Select a primary VOC</h3>

      <table align="center">
	<tbody>

	  <tr>
     	    <td><a href="roots.html#inorganic chemistry">Inorganic Section</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#alcohols">Alcohols and Glycols</a></td>
	    <td><a href="roots.html#aldehydes">Aldehydes</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#alkanes">Alkanes</a></td>
	    <td><a href="roots.html#alkenes">Alkenes</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#alkynes">Alkynes</a></td>
	    <td><a href="roots.html#aromatics">Aromatics</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#chloro">Chloro and Hydrochlorocarbons</a></td>
	    <td><a href="roots.html#dialkenes">Dialkenes</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#esters">Esters</a></td>
	    <td><a href="roots.html#ethers">Ethers and Glycol Ethers</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#bromo">Hydrobromocarbons</a></td>
	    <td><a href="roots.html#ketones">Ketones</a></td>
	  </tr>
	  <tr>
	    <td><a href="roots.html#terpenes">Monoterpenes</a></td>
	    <td><a href="roots.html#sesqui">Sesquiterpenes</a></td>
	  </tr>
	  <tr>
		<td><a href="roots.html#acids">Organic Acids</a></td>
	    <td><a href="roots.html#unclassified">Unclassified</a></td>
	    <td></td>
	  </tr>
	</tbody>
      </table>
	  <script language="JavaScript">

        <!-- Begin
        function checkAll(field)
        {
        for (i = 0; i < field.length; i++)
            field[i].checked = true ;
        }

        function uncheckAll(field)
        {
        for (i = 0; i < field.length; i++)
            field[i].checked = false ;
        }
        //  End -->
        </script>


    	<form name="myform" method="post" action="<?php echo U('/Home/Index/roots');?>">
	<input value="roots.html?None" type="hidden" name="url">


<br>


	<h4>Inorganic Chemistry</h4>
	<ul>
<!--	<div tal:define="name string:Thermal gas-phase reactions" tal:omit-tag="">
	      <li metal:use-macro="master/macros/inorgRxns"></li>
	  </div>
	 <div tal:define="name string:Gas-particle reactions" tal:omit-tag="">
	      <li metal:use-macro="master/macros/inorgRxns"></li>
	  </div>
<div tal:define="name string:Photolysis reactions" tal:omit-tag="">
	      <li metal:use-macro="master/macros/inorgRxns"></li>
	  </div>	-->
  <li>
	    <a href="inorg.html">Thermal gas-phase reactions </a>
	  </li><li>
	    <a href="inorg1.html">Gas-particle reactions </a>
	  </li><li>
	    <a href="inorg2.html">Photolysis reactions </a>
	  </li>
	</ul>
<input type="button" name="CheckAll" value="Check All" onclick="checkAll(document.myform.marks)">
<input type="button" name="UnCheckAll" value="Uncheck All" onclick="uncheckAll(document.myform.marks)">
	<a name="alcohols"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Alcohols and Glycols</h4>
	<ul>


	    <li>
    <input value="CH3OH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3OH">METHANOL</a>

</li>

	    <li>
    <input value="C2H5OH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C2H5OH">ETHANOL</a>

</li>

        <li>
            <input value="C2H5O2" type="checkbox" name="marks" class="marks" >
            <a href="browse.html?species=C2H5O2">C2H5O2</a>

        </li>
	    <!--<li>
    <input value="NPROPOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NPROPOL">1-PROPANOL (N-PROPANOL)</a>

</li>-->


	    <li>
    <input value="IPROPOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPROPOL">2-PROPANOL (I-PROPANOL)</a>

</li>


	    <li>
    <input value="NBUTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NBUTOL">1-BUTANOL (N-BUTANOL)</a>

</li>


	    <li>
    <input value="BUT2OL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BUT2OL">2-BUTANOL (SEC-BUTANOL)</a>



</li>


	    <li>
    <input value="IBUTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IBUTOL">2-METHYL-1-PROPANOL (I-BUTANOL)</a>



</li>


	    <li>
    <input value="TBUTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TBUTOL">2-METHYL-2-PROPANOL (T-BUTANOL)</a>



</li>


	    <li>
    <input value="PECOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PECOH">3-PENTANOL</a>



</li>


	    <li>
    <input value="IPEAOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPEAOH">2-METHYL-1-BUTANOL</a>



</li>


	    <li>
    <input value="ME3BUOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ME3BUOL">3-METHYL-1-BUTANOL (I-PENTANOL, I-AMYL ALCOHOL)</a>



</li>


	    <li>
    <input value="IPECOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPECOH">2-METHYL-2-BUTANOL</a>



</li>


	    <li>
    <input value="IPEBOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPEBOH">3-METHYL-2-BUTANOL</a>



</li>


	    <li>
    <input value="CYHEXOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CYHEXOL">CYCLOHEXANOL</a>



</li>


	    <li>
    <input value="MIBKAOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MIBKAOH">4-HYDROXY-4-METHYL-2-PENTANONE (DIACETONE ALCOHOL)</a>



</li>


	    <li>
    <input value="ETHGLY" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ETHGLY">ETHANE-1,2-DIOL (ETHYLENE GLYCOL)</a>



</li>


	    <li>
    <input value="PROPGLY" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PROPGLY">PROPANE-1,2-DIOL (PROPYLENE GLYCOL)</a>



</li>


	    <li>
    <input value="MBO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MBO">2-METHYL-3-BUTEN-2-OL</a>



</li>


	</ul>

	<a name="aldehydes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Aldehydes</h4>
	<ul>

	    <li>
    <input value="HCHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=HCHO">METHANAL (FORMALDEHYDE)</a>



</li>


	    <li>
    <input value="CH3CHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3CHO">ETHANAL (ACETALDEHYDE)</a>



</li>


	    <li>
    <input value="C2H5CHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C2H5CHO">PROPANAL (PROPRIONALDEHYDE)</a>



</li>


	    <li>
    <input value="C3H7CHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C3H7CHO">BUTANAL (BUTYRALDEHYDE)</a>



</li>


	    <li>
    <input value="IPRCHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPRCHO">METHYLPROPANAL (I-BUTYRALDEHYDE)</a>



</li>


	    <li>
    <input value="C4H9CHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C4H9CHO">PENTANAL (VALERALDEHYDE)</a>



</li>


	    <li>
    <input value="ACR" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ACR">PROPENAL (ACROLEIN)</a>



</li>


	    <li>
    <input value="MACR" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MACR">2-METHYLPROPENAL (METHACROLEIN)</a>



</li>


	    <li>
    <input value="C4ALDB" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C4ALDB">2-BUTENAL (CROTONALDEHYDE)</a>



</li>

	</ul>

	<a name="alkanes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Alkanes</h4>
	<ul>

	    <li>
    <input value="CH4" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH4">METHANE</a>



</li>


	    <li>
    <input value="C2H6" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C2H6">ETHANE</a>



</li>


	    <li>
    <input value="C3H8" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C3H8">PROPANE</a>



</li>


	    <li>
    <input value="NC4H10" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC4H10">N-BUTANE</a>



</li>


	    <li>
    <input value="IC4H10" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IC4H10">2-METHYL-PROPANE (I-BUTANE)</a>



</li>


	    <li>
    <input value="NC5H12" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC5H12">PENTANE (N-PENTANE)</a>



</li>


	    <li>
    <input value="IC5H12" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IC5H12">2-METHYLBUTANE (1-PENTANE)</a>



</li>


	    <li>
    <input value="NEOP" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NEOP">2,2-DIMETHYLPROPANE (NEO-PENTANE)</a>



</li>


	    <li>
    <input value="NC6H14" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC6H14">HEXANE (N-HEXANE)</a>



</li>


	    <li>
    <input value="M2PE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M2PE">2-METHYLPENTANE</a>



</li>


	    <li>
    <input value="M3PE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M3PE">3-METHYLPENTANE</a>



</li>


	    <li>
    <input value="M22C4" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M22C4">2,2-DIMETHYLBUTANE</a>



</li>


	    <li>
    <input value="M23C4" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M23C4">2,3-DIMETHYLBUTANE</a>



</li>


	    <li>
    <input value="NC7H16" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC7H16">HEPTANE (N-HEPTANE)</a>



</li>


	    <li>
    <input value="M2HEX" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M2HEX">2-METHYLHEXANE</a>



</li>


	    <li>
    <input value="M3HEX" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=M3HEX">3-METHYLHEXANE</a>



</li>


	    <li>
    <input value="NC8H18" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC8H18">OCTANE (N-OCTANE)</a>



</li>


	    <li>
    <input value="NC9H20" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC9H20">NONANE (N-NONANE)</a>



</li>


	    <li>
    <input value="NC10H22" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC10H22">DECANE (N-DECANE)</a>



</li>


	    <li>
    <input value="NC11H24" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC11H24">HENDECANE (N-UNDECANE)</a>



</li>


	    <li>
    <input value="NC12H26" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NC12H26">DODECANE (N-DODECANE)</a>



</li>


	    <li>
    <input value="CHEX" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CHEX">CYCLOHEXANE</a>



</li>


	</ul>

	<a name="alkenes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Alkenes</h4>
	<ul>

	    <li>
    <input value="C2H4" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C2H4">ETHENE (ETHYLENE)</a>



</li>


	    <li>
    <input value="C3H6" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C3H6">PROPENE (PROPYLENE)</a>



</li>


	    <li>
    <input value="BUT1ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BUT1ENE">1-BUTENE</a>



</li>


	    <li>
    <input value="CBUT2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CBUT2ENE">CIS-2-BUTENE</a>



</li>


	    <li>
    <input value="TBUT2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TBUT2ENE">TRANS-2-BUTENE</a>



</li>


	    <li>
    <input value="MEPROPENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MEPROPENE">2-METHYLPROPENE (I-BUTENE)</a>



</li>


	    <li>
    <input value="PENT1ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PENT1ENE">1-PENTENE</a>



</li>


	    <li>
    <input value="CPENT2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CPENT2ENE">CIS-2-PENTENE</a>



</li>


	    <li>
    <input value="TPENT2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TPENT2ENE">TRANS-2-PENTENE</a>



</li>


	    <li>
    <input value="ME2BUT1ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ME2BUT1ENE">2-METHYL-1-BUTENE</a>



</li>


	    <li>
    <input value="ME3BUT1ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ME3BUT1ENE">3-METHYL-1-BUTENE</a>



</li>


	    <li>
    <input value="ME2BUT2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ME2BUT2ENE">2-METHYL-2-BUTENE</a>



</li>


	    <li>
    <input value="HEX1ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=HEX1ENE">1-HEXENE</a>



</li>


	    <li>
    <input value="CHEX2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CHEX2ENE">CIS-2-HEXENE</a>



</li>


	    <li>
    <input value="THEX2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=THEX2ENE">TRANS-2-HEXENE</a>



</li>


	    <li>
    <input value="DM23BU2ENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DM23BU2ENE">2,3-DIMETHYL BUT-2-ENE</a>



</li>


	</ul>

	<a name="alkynes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Alkynes</h4>
	<ul>

	    <li>
    <input value="C2H2" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C2H2">ETHYNE (ACETYLENE)</a>



</li>


	</ul>

	<a name="aromatics"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Aromatics</h4>
	<ul>

	    <li>
    <input value="BENZENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BENZENE">BENZENE</a>



</li>


	    <li>
    <input value="TOLUENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TOLUENE">METHYLBENZENE (TOLUENE)</a>



</li>


	    <li>
    <input value="OXYL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=OXYL">1,2-DIMETHYL BENZENE (O-XYLENE)</a>



</li>


	    <li>
    <input value="MXYL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MXYL">1,3-DIMETHYL BENZENE (M-XYLENE)</a>



</li>


	    <li>
    <input value="PXYL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PXYL">1,4-DIMETHYL BENZENE (P-XYLENE)</a>



</li>


	    <li>
    <input value="EBENZ" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=EBENZ">ETHYL BENZENE</a>



</li>


	    <li>
    <input value="PBENZ" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PBENZ">N-PROPYL BENZENE</a>



</li>


	    <li>
    <input value="IPBENZ" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPBENZ">I-PROPYL BENZENE (CUMENE)</a>



</li>


	    <li>
    <input value="TM123B" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TM123B">1,2,3-TRIMETHYL BENZENE (HEMIMELLITENE)</a>



</li>


	    <li>
    <input value="TM124B" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TM124B">1,2,4-TRIMETHYL BENZENE (PSEUDOCUMENE)</a>



</li>


	    <li>
    <input value="TM135B" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TM135B">1,3,5-TRIMETHYL BENZENE (MESITYLENE)</a>



</li>


	    <li>
    <input value="OETHTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=OETHTOL">1-ETHYL 2-METHYL BENZENE (O-ETHYL TOLUENE)</a>



</li>


	    <li>
    <input value="METHTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=METHTOL">1-ETHYL 3-METHYL BENZENE (M-ETHYL TOLUENE)</a>



</li>


	    <li>
    <input value="PETHTOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PETHTOL">1-ETHYL 4-METHYL BENZENE (P-ETHYL TOLUENE)</a>



</li>


	    <li>
    <input value="DIME35EB" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIME35EB">1,3-DIMETHYL 5-ETHYL BENZENE (3,5-DIMETHYL ETHYL BENZENE)</a>



</li>


	    <li>
    <input value="DIET35TOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIET35TOL">1,3-DIETHYL 5-METHYLBENZENE (3,5-DIETHYL TOLUENE)</a>



</li>


	    <li>
    <input value="STYRENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=STYRENE">ETHENYL BENZENE (STYRENE)</a>



</li>


	    <li>
    <input value="BENZAL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BENZAL">BENZENECARBONAL (BENZALDEHYDE)</a>



</li>


	</ul>

	<a name="chloro"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Chloro and Hydrochlorocarbons</h4>
	<ul>

	    <li>
    <input value="CH3CL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3CL">CHLOROMETHANE (METHYL CHLORIDE)</a>



</li>


	    <li>
    <input value="CH2CL2" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH2CL2">DICHLOROMETHANE (METHYLENE DICHLORIDE)</a>



</li>


	    <li>
    <input value="CHCL3" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CHCL3">TRICHLOROMETHANE (CHLOROFORM)</a>



</li>


	    <li>
    <input value="CH3CCL3" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3CCL3">1,1,1-TRICHLOROETHANE (METHYL CHLOROFORM)</a>



</li>


	    <li>
    <input value="TCE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TCE">TETRA-CHLOROETHENE (PER-CHLOROETHYLENE)</a>



</li>


	    <li>
    <input value="TRICLETH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TRICLETH">TRI-CHLOROETHENE</a>



</li>


	    <li>
    <input value="CDICLETH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CDICLETH">CIS-1,2-DICHLOROETHENE</a>



</li>


	    <li>
    <input value="TDICLETH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TDICLETH">TRANS-1,2-DICHLOROETHENE</a>



</li>


	    <li>
    <input value="CH2CLCH2CL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH2CLCH2CL">1,2-DICHLOROETHANE</a>



</li>


	    <li>
    <input value="CCL2CH2" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CCL2CH2">1,1-DICHLOROETHENE</a>



</li>


	    <li>
    <input value="CL12PROP" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CL12PROP">1,2-DICHLOROPROPANE</a>



</li>


	    <li>
    <input value="CHCL2CH3" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CHCL2CH3">1,1-DICHLOROETHANE</a>



</li>


	    <li>
    <input value="CH3CH2CL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3CH2CL">CHLOROETHANE</a>



</li>


	    <li>
    <input value="CHCL2CHCL2" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CHCL2CHCL2">1,1,2,2-TETRACHLOROETHANE</a>



</li>


	    <li>
    <input value="CH2CLCHCL2" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH2CLCHCL2">1,1,2-TRICHLOROETHANE</a>



</li>


	    <li>
    <input value="VINCL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=VINCL">CHLOROETHENE (VINYL CHLORIDE)</a>



</li>

	</ul>

	<a name="dialkenes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Dialkenes</h4>
	<ul>

	    <li>
    <input value="C4H6" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C4H6">1-3 BUTADIENE</a>



</li>


	    <li>
    <input value="C5H8" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=C5H8">2-METHYL-1,3-BUTADIENE (ISOPRENE)</a>



</li>


	</ul>

	<a name="esters"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Esters</h4>
	<ul>

	    <li>
    <input value="CH3OCHO" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3OCHO">METHYL FORMATE</a>



</li>


	    <li>
    <input value="METHACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=METHACET">METHYL ACETATE</a>



</li>


	    <li>
    <input value="ETHACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ETHACET">ETHYL ACETATE</a>



</li>


	    <li>
    <input value="NPROACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NPROACET">N-PROPYL ACETATE</a>



</li>


	    <li>
    <input value="IPROACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=IPROACET">I-PROPYL ACETATE</a>



</li>


	    <li>
    <input value="NBUTACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=NBUTACET">N-BUTYL ACETATE</a>



</li>


	    <li>
    <input value="SBUTACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=SBUTACET">S-BUTYL ACETATE</a>



</li>


	    <li>
    <input value="TBUACET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=TBUACET">T-BUTYL ACETATE</a>



</li>


	</ul>

	<a name="ethers"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Ethers and Glycol Ethers</h4>
	<ul>

	    <li>
    <input value="CH3OCH3" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3OCH3">DIMETHYL ETHER</a>



</li>


	    <li>
    <input value="DIETETHER" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIETETHER">DIETHYL ETHER</a>



</li>


	    <li>
    <input value="MTBE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MTBE">METHYL T-BUTYL ETHER</a>



</li>


	    <li>
    <input value="DIIPRETHER" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIIPRETHER">DI I-PROPYL ETHER</a>



</li>


	    <li>
    <input value="ETBE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=ETBE">ETHYL T-BUTYLETHER</a>



</li>


	    <li>
    <input value="MO2EOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MO2EOL">2-METHOXY ETHANOL</a>



</li>


	    <li>
    <input value="EOX2EOL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=EOX2EOL">2-ETHOXY ETHANOL</a>



</li>


	    <li>
    <input value="PR2OHMOX" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=PR2OHMOX">1-METHOXY 2-PROPANOL</a>



</li>


	    <li>
    <input value="BUOX2ETOH" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BUOX2ETOH">2-BUTOXY ETHANOL</a>



</li>


	    <li>
    <input value="BOX2PROL" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BOX2PROL">1-BUTOXY 2-PROPANOL</a>



</li>


	</ul>

	<a name="bromo"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Hydrobromocarbons</h4>
	<ul>

	    <li>
    <input value="CH3BR" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3BR">BROMOMETHANE</a>



</li>


	    <li>
    <input value="DIBRET" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIBRET">1,2-DIBROMOETHANE</a>



</li>


	</ul>

	<a name="ketones"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Ketones</h4>
	<ul>

	    <li>
    <input value="CH3COCH3" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CH3COCH3">PROPANONE (ACETONE)</a>



</li>


	    <li>
    <input value="MEK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MEK">BUTANONE (METHYL ETHYL KETONE)</a>



</li>


	    <li>
    <input value="MPRK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MPRK">2-PENTANONE (METHYL N-PROPYL KETONE)</a>



</li>


	    <li>
    <input value="DIEK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=DIEK">3-PENTANONE (DIETHYL KETONE)</a>



</li>


	    <li>
    <input value="MIPK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MIPK">3-METHYL 2-BUTANONE(METHYL I-PROPYL KETONE)</a>



</li>


	    <li>
    <input value="HEX2ONE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=HEX2ONE">2-HEXANONE (METHYL N-BUTYL KETONE)</a>



</li>


	    <li>
    <input value="HEX3ONE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=HEX3ONE">3-HEXANONE (ETHYL N-PROPYL KETONE)</a>



</li>


	    <li>
    <input value="MIBK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MIBK">4-METHYL 2-PENTANONE (METHYL I-BUTYL KETONE)</a>



</li>


	    <li>
    <input value="MTBK" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=MTBK">3,3-DIMETHYL 2-BUTANONE (METHYL T-BUTYL KETONE)</a>



</li>


	    <li>
    <input value="CYHEXONE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=CYHEXONE">CYCLOHEXANONE</a>



</li>


	</ul>

	<a name="terpenes"></a>
	<input class="right addMarks" type="button" value="Add Selection to Mark List">
	<h4>Monoterpenes</h4>
	<ul>

	    <li>
    <input value="APINENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=APINENE">ALPHA-PINENE</a>



</li>


	    <li>
    <input value="BPINENE" type="checkbox" name="marks" class="marks" >
    <a href="browse.html?species=BPINENE">BETA-PINENE</a>



</li>


	 </ul>
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