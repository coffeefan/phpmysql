<?php
require_once realpath(dirname(__FILE__))."/filewriter.php";

function showblogs(){
    $blogposts=array();
    $dir="posts";
    $files= getAllFiles();
    $i=0;
    foreach($files as $file){
        $blogpost=getBlogData($file);
        $blogposts[$i]=$blogpost;
        $i++;


    }
    return $blogposts;
}

function getBlogPost($blogpostid){
    $content=getContentOfFile($blogpostid.".txt");
    return getBlogData($content);
}

function getBlogData($content){
    $data["blogpostid"]=substr($content,(strpos($content,"[blogpostid]")+12),(strpos($content,"[/blogpostid]"))-(strpos($content,"[blogpostid]")+12));
    $data["time"]=substr($content,(strpos($content,"[time]")+6),(strpos($content,"[/time]"))-(strpos($content,"[time]")+6));
    $data["content"]=substr($content,(strpos($content,"[content]")+9),(strpos($content,"[/content]"))-(strpos($content,"[content]")+9));
    $data["title"]=substr($content,(strpos($content,"[title]")+7),(strpos($content,"[/title]"))-(strpos($content,"[title]")+7));
    return $data;
}


function createBlog($title,$content){
    $blogpostid=time().uniqid();
    $content="[blogpostid]".$blogpostid."[/blogpostid]
[time]".date("d.m.Y H:i")."[/time]
[title]".$title."[/title]
[content]".$content."[/content]";
    writeFileToServer($blogpostid.".txt",$content);
}

function updateBlog($blogpostid,$title,$content,$erstellungsdatum){
    $content="[blogpostid]".$blogpostid."[/blogpostid]
[time]".$erstellungsdatum."[/time]
[title]".$title."[/title]
[content]".$content."[/content]";
    writeFileToServer($blogpostid.".txt",$content);
}

function deleteBlog($blogpostid){
    deleteFile($blogpostid.".txt");
}
?>