<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <style media="screen">
      </style>
   </head>
   <body>
      <div id="page">
         <?php if(is_array($report)): foreach($report as $key=>$vo): ?>帖子名称:<p><?php echo ($vo["s_title"]); ?></p>
             举报内容:<p><?php echo ($vo["r_content"]); ?></p>
             举报用户:<p><?php echo ($vo["u_email"]); ?></p>
             举报时间:<p><?php echo (date('Y-m-d H:i:s',$vo["r_time"])); ?></p><?php endforeach; endif; ?>
      </div>
   </body>
</html>