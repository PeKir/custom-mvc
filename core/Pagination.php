<?php

namespace core;

class Pagination
{

    private $currentPage;
    private $rowsCount;
    private $postsOnPage;


    public function __construct($currentPage, $rowsCount, $postsOnPage)
    {
        $this->currentPage = $currentPage;
        $this->rowsCount   = $rowsCount;
        $this->postsOnPage = $postsOnPage;
    }


    public function getHtml()
    {
        $prefix = '<ul class="pagination pagination-primary">';
        $suffix = '</ul>';

        $linsList = $this->generatePaginationList();

        foreach ($linsList as $link) {
            $prefix .= $link;
        }

        return  $prefix . $suffix;
    }

    private function generatePaginationList()
    {

        $result     = [];
        $pagesCount = (int) $this->definePagesCount() ;
        for ($i = 0; $i <= $pagesCount; $i++) {

            $linkNumber = $i == 0 ? '' : $i;
            $pageNumber = $i + 1;
            $isActive   = $i == $this->currentPage ? $this->setActiveDay() : '';
            $pageLink   = '<a class="page-link" href="/' . $linkNumber . '">'
                          . $pageNumber . '</a>';

            $classes = 'page-item';
            $prefix  = '<li class="' . $classes . ' ' . $isActive . '"> ';
            $suffix  = ' </li> ';

            $result[] = $prefix . $pageLink . $suffix;
        }

        return $result;
    }

    private function definePagesCount()
    {
        if ($this->rowsCount < $this->postsOnPage) {
            return 0;
        } else {
            return $this->rowsCount / $this->postsOnPage;
        }

    }

    private
    function setActiveDay()
    {
        return 'active';
    }
}