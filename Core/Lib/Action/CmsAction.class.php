<?php

class CmsAction extends Action {

    public function _initialize() {
        if( I("post.sessionid")!='' ){
            session('[pause]');
            session_id(I("post.sessionid"));
            session('[start]');
        }
    }
}
