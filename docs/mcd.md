has, 11 USER, 0N ROLE
USER: user_id, email, password, firstname, lastname, displayname, avatar
add to favorites, 0N USER, 0N TUTORIAL
needs, 1N TUTORIAL, 0N TOOL
TOOL: tool_id, name, slug

ROLE: role_key, name
writes, 11 COMMENT, 0N USER
TUTORIAL: tutorial_id, title, excerpt, content, image, author, date, rating, estimated_time
requires, 0N TUTORIAL, 0N MATERIAL
MATERIAL: material_id, name, slug

:
COMMENT: comment_id, content
comments, 0N TUTORIAL, 11 COMMENT
belongs to, 0N TUTORIAL, 0N CATEGORY
CATEGORY: category_id, name, slug