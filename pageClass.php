<?php

class Page {

    static public $nowPage = 10;
    static public $totalPage = 40;

    function pageList() {
        $p_array = array();
        $n_array = array();
//        var_dump(self::$nowPage);
        if (self::$nowPage <= 8) { //左列表
            for ($i = 1; $i != 9; $i++) {
                $p_array[] = $i;
            }
        }
        if (self::$nowPage >= self::$totalPage - 7) { //右列表
            for ($i = self::$totalPage - 7; $i != self::$totalPage + 1; $i++) {
                $n_array[] = $i;
            }
        }
        if (8 < self::$nowPage && self::$nowPage < self::$totalPage - 7) {
            for ($i = self::$nowPage - 5; $i != self::$nowPage; $i++) {
                $p_array[] = $i;
            }
            for ($i = self::$nowPage + 1; $i != self::$nowPage + 6; $i++) {
                $n_array[] = $i;
            }
        }
        $previous = self::$nowPage;
        $next = self::$nowPage;
        $html = self::$nowPage != 1 ? "<a href=html.php?nowPage=" . (--$previous) . ">previous</a>" : "<a style='display:none;'>previous</a> ";
        $html .= self::$nowPage > 8 ? "<a href='html.php?nowPage=1'>1</a> <a href='html.php?nowPage=2'>2</a> <a > ... </a>" : '';
        foreach ($p_array as $key => $value) {
            $html .= " <a href='html.php?nowPage=" . $value . "'>" . (self::$nowPage == $value ? $this->colorFont($value) : $value) . "</a> ";
        }
        $html .= self::$nowPage <= 8 || self::$nowPage >= self::$totalPage - 7 ? '' : "<span style='color:red;'>" . $this->colorFont(self::$nowPage) . "</span>";
        foreach ($n_array as $key => $value) {
            $html .= " <a href='html.php?nowPage=" . $value . "'>" . (self::$nowPage == $value ? $this->colorFont($value) : $value) . "</a> ";
        }
        $html .= self::$nowPage < self::$totalPage - 7 ? "<a display='none'> ... </a> <a href='html.php?nowPage=" . (self::$totalPage - 1) . "'>" . (self::$totalPage - 1) . "</a> <a href='html.php?nowPage=" . self::$totalPage . "'>" . self::$totalPage . "</a>" : '';
        $html .= self::$nowPage != self::$totalPage ? " <a href=html.php?nowPage=" . (++$next) . ">next</a>" : "<a style='display:none;'>next</a>";
        echo $html;
    }

    private function colorFont($page) {
        return "<span style='color:red;'>" . $page . "</span>";
    }

}

?>
