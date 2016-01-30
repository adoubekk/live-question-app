# -*- coding: utf-8 -*-


db.define_table('posts',
                Field('User_Name'),
                Field('body', 'text'),
                Field('private', 'boolean'),
                auth.signature)

db.posts.body.requires = IS_NOT_EMPTY()
