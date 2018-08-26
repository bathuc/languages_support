<?php

namespace App\Helpers;
use DOMDocument;
use DOMXPath;

class Dom
{
    public static function curl($url = "", $method = 'get',$params = [], $authen = [], $header = 'default')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6');

        // neu ko dung POST, mac dinh method cua curl la GET
        if($method == 'post') {
            if($header == 'default') {
                // ko dung header, mac dinh header la application/x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            }
            elseif($header == 'json') {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            }
        }

        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            \Log::Info('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }

    /*
     * $mix: string | DomElement
     * return: DOMNodeList
     */
    public static function getNodesByClass($mix, $classname)
    {
        $html = $mix;
        if(gettype($mix) =='object' && get_class($mix) == 'DOMElement') {
            $html = self::toHtml($mix);
        }

        $doc = new DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);

        $doc->loadHTML($html);
        $finder = new DomXPath($doc);
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
        return $nodes;
    }

    /*
     * $mix: string | DomElement
     * return: DOMNodeList
     */
    public static function getNodesByTagName($mix, $tag)
    {
        $nodes = null;
        $mixType = gettype($mix);
        if($mixType == 'string') {
            $dom = new DOMDocument();
            $internalErrors = libxml_use_internal_errors(true);
            $dom->loadHTML($mix);
            $nodes = $dom->getElementsByTagName($tag);
        }
        elseif($mixType == 'object'){
            if(get_class($mix) == 'DOMElement'){
                $nodes = $mix->getElementsByTagName($tag);
            }
        }

        return $nodes;
    }

    /*
     * $element: string | DOMElement
     * return DOMElement
     */
    public static function getElementById ($mix, $id)
    {
        $html = $mix;
        if(gettype($mix) =='object' && get_class($mix) == 'DOMElement') {
            $html = self::toHtml($mix);
        }

        $element = null;
        $dom = new DOMDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        return $dom->getElementById($id);
    }

    /*
     * $nodes: DOMNodeList | DOMElement
     * return: html
     */
    public static function toHtml($nodes)
    {
        if(gettype($nodes) == 'string') {
            return $nodes;
        }

        $dom = new DOMDocument();
        $classType = get_class($nodes);
        switch ($classType) {
            case 'DOMElement':
                $dom->appendChild($dom->importNode($nodes,true));
                break;
            case 'DOMNodeList':
                foreach ($nodes as $node) {
                    $dom->appendChild($dom->importNode($node,true));
                }
                break;
        }

        return $dom->saveHtml();
    }

    /*
     * $nodes: DOMNodeList
     * return: DOMElement
     */
    public static function getNodeByIndex($nodes, $index)
    {
        $count = 0;
        foreach ($nodes as $node) {
            if($count == $index) {
                return $node;
            }
            $count++;
        }
        return null;
    }

    /*
     * $nodes: DOMNodeList
     * purpose: count number of DOMNodeLists
     */
    public static function nodesCount($nodes)
    {
        $count = 0;
        foreach ($nodes as $node) {
            $count++;
        }
        return $count;
    }

    /*
     * $nodes: DOMNodeList
     * purpose: get first child of DOMNodeList
     * return: DOMElement
     */
    public static function getFirstNode($nodes)
    {
        $firstChild = null;
        foreach ($nodes as $node) {
            $firstChild = $node;
            break;
        }
        return $firstChild;
    }

    /*
     * $nodes: DOMNodeList
     * purpose: get last child of DOMNodeList
     * return: DOMElement
     */
    public static function getLastNode($nodes)
    {
        $lastChild = null;
        foreach ($nodes as $node) {
            $lastChild = $node;
        }
        return $lastChild;
    }

    /*
     * $domElement: DOMElement
     * return: DOMNodeList
     */
    public static function getDomElementChildren($element)
    {
        return $element->childNodes;
    }

    /*
     * $element: DOMElement
     */
    public static function getDomElementAttribute($element, $attribute)
    {
        return $element->getAttribute($attribute);
    }

    /*
     * $element: DOMElement
     */
    public static function getDomElementValue($element)
    {
        return $element->nodeValue;
    }

}

