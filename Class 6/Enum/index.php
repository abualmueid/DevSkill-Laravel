<?php

enum Status
{
    case DRAFT;
    case PUBLISHED;
    case ARCHIVED;
}

class BlogPost 
{
    // public Status $status;

    public function __construct(public Status $status)
    {
        // $this->status = $status;   
    }
}

$post = new BlogPost(Status::DRAFT);
print_r($post->status);