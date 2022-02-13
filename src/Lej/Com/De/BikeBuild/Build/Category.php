<?php

namespace Lej\Com\De\BikeBuild\Build;

enum Category: string
{
    case Frame = 'frame';
    case Wheels = 'wheels';
    case Group = 'group';
    case Attachments = 'attachments';
    case Tools = 'tools';
    case Other = 'other';
}
