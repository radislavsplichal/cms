<?php
namespace CMSCore;
interface cmsItem{
    function show();
    function save ($type,$values);
    function delete ($id,$type);
    function edit ($id,$type,$values);
    function read ($sql);
}