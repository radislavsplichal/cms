<?php
namespace CMSCore;
interface cmsItem{
    function show();
    function save ();
    function delete ($id,$type);
    function edit ($id,$type,$values);
    function read ($sql);
}