<?php
class BBParser{

    public static function deletePTags($text)
    {
        /**
         * @var string
         */

        return $text;
    }

    public function replaceTags($text)
    {
        $string = '';
        $text = preg_replace('~&nbsp;~s', '', $text);
        $text = preg_replace('~<p>\[(.*?)\]<\/p>~s', '[$1]', $text);
        $result = preg_match('~\[\w+\](.*?)\[/\w+\]~s', $text, $matches);
        if ($result) {

//            if (preg_match('~\[PARAGRAPH\](.*?)\[/PARAGRAPH\]~s', $text)) {
//                $text = preg_replace('~\[PARAGRAPH\](.*?)\[/PARAGRAPH\]~s', '<p>$1</p>', $text);
//            }
//
//            if (preg_match('~\[BLOCK\](.*?)\[/BLOCK\]~s', $text)) {
//                $text = preg_replace('~\[BLOCK\](.*?)\[/BLOCK\]~s', '<div class="m-2">$1</div>', $text);
//            }
            /**
             * <div class="m-3">
                    <div class="bq">
                        <div class="bq__text">Каждый букет собирается под заказ не более чем за час до выдачи заказчику. Вы можете быть уверены все ингредиенты в букете свежие. Срок хранения букета зависит от состава.</div>
                    </div>
                </div>
             */
            if (preg_match('~\[BANNER\](.*?)\[/BANNER\]~s', $text)) {
                $text = preg_replace('~\[BANNER\](.*?)\[/BANNER\]~s', '<div class="m-3"><div class="bq"><div class="bq__icon">&nbsp;</div><div class="bq__text"><blockquote>$1</blockquote></div></div></div>', $text);
            }
            /**
             * <div class="m-3">
                    <div class="a-images">
                        <div class="a-images__wrapper">
                            <div class="a-images__element">
                                <div class="a-images__image">
                                    <img class="image image_cover" src="/assets/images/static/img-1.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            */
            if (preg_match('~\[TRIPLE_IMG\](.*?)\[/TRIPLE_IMG\]~s', $text)) {
                preg_match('~\[TRIPLE_IMG\](.*?)\[/TRIPLE_IMG\]~s', $text, $item);
                $images = explode('>', $item[1]);
                $string .= '<div class="m-3"><div class="a-images"><div class="a-images__wrapper">';
                $full = true;

                foreach ($images as $image) {
                    if (strlen($image)>10){
                            $string .= '<div class="a-images__element"><div class="a-images__image">'.$this->getImage($image).'</div></div>';
                    }
                }

                $string .= '</div></div></div>';
                $text = preg_replace('~\[TRIPLE_IMG\](.*?)\[/TRIPLE_IMG\]~s', $string, $text);
                $string = '';
            }

            if (preg_match('~\[IMG_HEAD\](.*?)\[/IMG_HEAD\]~s', $text)) {
                preg_match('~\[IMG_HEAD\](.*?)\[/IMG_HEAD\]~s', $text, $item);
                $images = explode('img', $item[1]);

                $string .= '<div class="m-3"><div class="a-head"><div class="a-head__block">';

                foreach ($images as $image) {
                    if (strlen($image)>10){
                        $string .= '<div class="a-head__img">'.$this->getImage($image).'</div>';

                    }
                }
                $string .= '</div><div class="a-head__block"><div class="a-head__content">';

                preg_match('~\[TEXT_HEAD\](.*?)\[/TEXT_HEAD\]~s', $text, $item2);
                $string .= $item2[1];
                $string .= '</div></div></div></div>';
                $text = preg_replace('~\[IMG_HEAD\](.*?)\[/TEXT_HEAD\]~s', $string, $text);
//                $text = preg_replace('~\[TEXT_HEAD\](.*?)\[/TEXT_HEAD\]~s', $string, $text);
                $string = '';
            }

            /**
             * <div class="m-3">
            <div class="a-block">
            <p>Если в букете есть цветы, их можно перенести в вазу или другую ёмкость. Обычно растения закрепляются в букете на флористическую губку, в неё можно подливать воду. У всех цветов разный срок хранения. Следите, чтобы у них всегда была вода. Срок жизни цветка можно продлить, если время от времени подрезать стебель.</p>
            <ul>
            <li><strong>Букет из ягод</strong>
            <p>Часто дарят букеты из клубники в шоколаде. Это романтично, эстетично и вкусно. Храните его в прохладном месте 2-3 дня. Если вы купили букет заранее, то можно хранить его не более 12 часов при комнатной температуре, прежде чем подарить.</p>
            </li>
            <li><strong>Букет из ягод</strong>
            <p>Часто дарят букеты из клубники в шоколаде. Это романтично, эстетично и вкусно. Храните его в прохладном месте 2-3 дня. Если вы купили букет заранее, то можно хранить его не более 12 часов при комнатной температуре, прежде чем подарить.</p>
            </li>
            <li><strong>Букет из ягод</strong>
            <p>Часто дарят букеты из клубники в шоколаде. Это романтично, эстетично и вкусно. Храните его в прохладном месте 2-3 дня. Если вы купили букет заранее, то можно хранить его не более 12 часов при комнатной температуре, прежде чем подарить.</p>
            </li>
            <li><strong>Букет из ягод</strong>
            <p>Часто дарят букеты из клубники в шоколаде. Это романтично, эстетично и вкусно. Храните его в прохладном месте 2-3 дня. Если вы купили букет заранее, то можно хранить его не более 12 часов при комнатной температуре, прежде чем подарить.</p>
            </li>
            </ul>
            </div>
            </div>
            */
            if (preg_match('~\[BLOCK(.*?)\](.*?)\[/BLOCK\]~s', $text)) {
                $string = '<div class="m-3"><div class="a-block">';

                preg_match_all('~\[BLOCK(.*?)\]~s', $text, $titles);

                foreach ($titles[1] as $k=>$title){
                    preg_match('/title=\"(.*?)\"/', $titles[1][$k], $title);

                    $string ='<div class="m-3"><div class="a-block">'.'<h3>'.$title[1].'</h3>';

                    $text = preg_replace('~\[BLOCK '.$title[0].']~s', $string,$text);
                }

                $text = preg_replace('~\[/BLOCK\]~s', '</div></div>',$text);
            }
        }

        return $text;
    }

    public function getFullImage($image){
        preg_match("~src=\"(.+)\"~s", $image, $matches);
        $href = $matches[1];

        return '<a href="'.$href.'"><img class="image image_cover" src="'.$href.'"></a>';


    }
    public function getImage($image){
        preg_match("~src=\"(.+)\"~s", $image, $matches);
        $href = $matches[1];
        if (strlen($image)>10){
            return '<a href="'.$href.'"><img class="image image_cover" src="'.$href.'"></a>';
        }
        else{
            return '';
        }

    }
}