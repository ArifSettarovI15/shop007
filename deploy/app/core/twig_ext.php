<?php
$function = new \Twig\TwigFunction('unique_string', function () {
    return GenerateName(16,2);
});
$this->twig->addFunction($function);


$function = new \Twig\TwigFunction('format_money', function ($value) {
	return number_format($value, 0, '', ' ');
});
$this->twig->addFunction($function);

$function = new \Twig\TwigFunction('number_to_string', function ($value) {
	return num2str($value);
});
$this->twig->addFunction($function);


$function = new \Twig\TwigFunction('file_type', function ($value) {
	$hh=explode('.',$value);
	$ext=strtolower($hh[count($hh)-1]);
	if ($ext=='jpg' or $ext=='jpeg') {
		return "image/jpeg";
	}
	elseif ($ext=='gif') {
		return "image/gif";
	}
	elseif ($ext=='png') {
		return "image/png";
	}

	return '';
});
$this->twig->addFunction($function);

$function = new \Twig\TwigFunction('file_name', function ($value) {
	return pathinfo($value, PATHINFO_FILENAME);
});
$this->twig->addFunction($function);

$this->twig->addExtension(new \Twig\Extension\DebugExtension());

$function = new \Twig\TwigFilter('prepare_title', function ($value) {
    $title_array=explode(' ',$value);
    $string = $title_array[0]." <span>";
    unset($title_array[0]);
    foreach ($title_array as $item ){
        $string.=$item.' ';
    }
    if (substr($string, -1)==' '){
        $string = substr($string, 0, -1)."</span>";
    }else{
        $string.="</span>";
    }
    return $string;
});
$this->twig->addFilter($function);

$function = new \Twig\TwigFilter('arr_string', function ($value) {
    $string=implode(', ',$value);
    return $string;
});
$this->twig->addFilter($function);

$function = new \Twig\TwigFilter('sklon_tovar', function ($number) {
     $words = ['товар', 'товара', 'товаров'];
        $cases = array(2, 0, 1, 1, 1, 2);
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
});
$this->twig->addFilter($function);

$function = new \Twig\TwigFilter('sklon_review', function ($number) {
     $words = ['отзыв', 'отзыва', 'отзывов'];
        $cases = array(2, 0, 1, 1, 1, 2);
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
});
$this->twig->addFilter($function);

$function = new \Twig\TwigFilter('sklon_review_rod', function ($number) {
     $words = ['отзыва', 'отзывов', 'отзывов'];
        $cases = array(2, 0, 1, 1, 1, 2);
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
});
$this->twig->addFilter($function);

