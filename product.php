<?php
// | Create: 2016/6/6 
// +----------------------------------------------------------------------
// | Author: 海枯 <haiku888@foxmail.com> 
// +----------------------------------------------------------------------
// | Description:  
// +----------------------------------------------------------------------

$name = $_POST['name'];
$school = $_POST['xuexiao'];
$kemu = $_POST['kemu'];
$sex = $_POST['sex'];

$img = createWordsWatermark('./linshi.jpg', '时尚前沿|trands', '65', '255,1,1', '110','25', 'Songti.ttf', '0', './newpic.jpg',$name,$school,$sex,$kemu);

/**
 * 给图片添加文字水印 可控制位置，旋转，多行文字    **有效字体未验证**
 * @param string $imgurl  图片地址
 * @param array $text   水印文字（多行以'|'分割）
 * @param int $fontSize 字体大小
 * @param type $color 字体颜色  如： 255,255,255
 * @param int $point 水印位置
 * @param type $font 字体
 * @param int $angle 旋转角度  允许值：  0-90   270-360 不含
 * @param string $newimgurl  新图片地址 默认使用后缀命名图片
 * @return boolean
 */
function createWordsWatermark($imgurl, $text, $fontSize = '14', $color = '0,0,0', $leftPos,$topPos, $font = 'simhei.ttf', $angle = 0, $newimgurl = '',$name,$school,$sex,$kemu) {

    $imageCreateFunArr = array('image/jpeg' => 'imagecreatefromjpeg', 'image/png' => 'imagecreatefrompng', 'image/gif' => 'imagecreatefromgif');
    $imageOutputFunArr = array('image/jpeg' => 'imagejpeg', 'image/png' => 'imagepng', 'image/gif' => 'imagegif');

//获取图片的mime类型
    $imgsize = getimagesize($imgurl);

    if (empty($imgsize)) {
        return false; //not image
    }

    $imgWidth = $imgsize[0];
    $imgHeight = $imgsize[1];
    $imgMime = $imgsize['mime'];

    if (!isset($imageCreateFunArr[$imgMime])) {
        return false; //do not have create img function
    }
    if (!isset($imageOutputFunArr[$imgMime])) {
        return false; //do not have output img function
    }

    $imageCreateFun = $imageCreateFunArr[$imgMime];
    $imageOutputFun = $imageOutputFunArr[$imgMime];

    $im = $imageCreateFun($imgurl);

    /*
     * 参数判断
     */
    $text_color = imagecolorallocate($im, intval($color[0]), intval($color[1]), intval($color[2])); //文字水印颜色
    $fontUrl = './' . ($font ? $font : 'simhei.ttf'); //有效字体未验证


    imagettftext($im, $fontSize, $angle, 1235, 1070, $text_color, $fontUrl, "1303105275");
    imagettftext($im, $fontSize, $angle, 1235, 1280, $text_color, $fontUrl, $name);
    imagettftext($im, $fontSize, -1, 1235, 1900, $text_color, $fontUrl, $school);
    imagettftext($im, $fontSize, $angle, 1235, 1490, $text_color, $fontUrl, $sex);
    //数学
    imagettftext($im, 55, $angle, 2010, 2860, $text_color, $fontUrl, $kemu);
    //综合
    imagettftext($im, 55, $angle, 2000, 3090, $text_color, $fontUrl, $kemu);



// 输出图像
    $imageOutputFun($im, $newimgurl, 80);

// 释放内存
    imagedestroy($im);
    return $newimgurl;
}
?>
<!DOCTYPE html>
<!-- saved from url=(0058)http://zkz.meiyai.com/?form=singlemessage&isappinstalled=0 -->
<html data-dpr="1" style="font-size: 54px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>高考准考证生成，朋友圈最新装逼神器！</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="cleartype" content="on">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="mobile-web-app-capable" content="yes">
    <script src="resource/hm.js"></script><script src="resource/saved_resource"></script><style>html{color:#000;background:#fff;overflow-y:scroll;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}  html *{outline:0;-webkit-text-size-adjust:none;-webkit-tap-highlight-color:rgba(0,0,0,0)}  html,body{font-family:sans-serif}  body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{margin:0;padding:0}  input,select,textarea{font-size:100%}  table{border-collapse:collapse;border-spacing:0}  fieldset,img{border:0}  abbr,acronym{border:0;font-variant:normal}  del{text-decoration:line-through}  address,caption,cite,code,dfn,em,th,var{font-style:normal;font-weight:500}  ol,ul{list-style:none}  caption,th{text-align:left}  h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:500}  q:before,q:after{content:''}  sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}  sup{top:-.5em}  sub{bottom:-.25em}  a:hover{text-decoration:underline}  ins,a{text-decoration:none}</style><meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="resource/index.css">
</head>

<body style="font-size: 12px;">
<div id="ticket" class="content" style="display: block;">
    <div class="tips"></div>
    <img src="<?= $img ?>">
    <a type="button" id="downButton" class="btn btn-ticket">长按图片保存到手机</a>
</div>
<script type="text/javascript" src="resource/jquery.min.js"></script>
<script type="text/javascript" src="resource/index.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?25421b385436b3e840792c21c1ca9b82";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>



</body></html>
