<div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	<?php foreach($trace as $key => $value){ ?>
    <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700"><?php echo $key ?></span>
    <?php } ?>
</div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		<?php foreach($trace as $info) { ?>
    <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<?php 
	if(is_array($info)){
		foreach ($info as $k=>$val){
		echo '<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">' . (is_numeric($k) ? '' : $k.' : ') . htmlentities($val,ENT_COMPAT,'utf-8') .'</li>';
	    }
	}
    ?>
    </ol>
    </div>
    <?php } ?>
</div>
</div>
