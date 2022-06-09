has, 11 USER, 0N ROLE
USER: user_code, email, password, firstname, lastname, displayname, avatar
add to favorites, 0N USER, 0N TUTORIAL
needs, 1N TUTORIAL, 0N TOOL
TOOL: tool_code, name, slug, image

ROLE: role_key, name
writes, 11 COMMENT, 0N USER
TUTORIAL: tutorial_code, title, excerpt, content, image, author, date, rating, estimated_time
requires, 0N TUTORIAL, 0N MATERIAL
MATERIAL: material_code, name, slug, image

:
COMMENT: comment_code, content
comments, 0N TUTORIAL, 11 COMMENT
belongs to, 0N TUTORIAL, 0N CATEGORY
CATEGORY: category_code, name, slug, image