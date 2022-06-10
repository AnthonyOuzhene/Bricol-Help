# Dictionnaire de données 

## Entités

Nom      | Table WordPress | Détail(s)
---------|-----------------|--------------------
User     | `user`          | role `bricoleur`
Tutorial | `posts`         | type `CPT`
Comment  | `users`         | role `comment`
Role     | `role`          | type `role`
Tool     | `terms`         | taxonomy `tool`
Category | `terms`         | taxonomy `category`
Material | `terms`         | taxonomy `material`

## Propriétés (Attributs)

### User

Propriété | Table WordPress | Colonne          | Détail(s)
----------|-----------------|------------------|----------
user_id   | `user`          | `ID`             |
email     | `user`          | `user_email`     |
password  | `user`          | `user_password`  |
firstname | `usermeta`      | `user_firstname` |
lastname  | `user`          | `user_lastname`  |
avatar    | `usermeta`      | `meta_value`     |

### Comment

Propriété  | Table WordPress | Colonne   | Détail(s)
-----------|-----------------|-----------|----------
comment_id | `user_meta`     | `term_id` |
content    | `user_meta`     | `content` |

### Tutorial

Propriété      | Table WordPress | Colonne        | Détail(s)
---------------|-----------------|----------------|-------------------------------------------------------
tutorial_id    | `tutorial`      | `ID`           | `BIGINT, PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT`
title          | `posts`         | `post_title`   |
excerpt        | `posts`         | `post_excerpt` |
content        | `posts`         | `post_content` |
image          | `posts`         | `post_image`   |
author         | `posts`         | `post_author`  |
date           | `posts`         | `post_date`    |
rating         | `tutorial`      | `meta_value`   | `INT, NOT NULL, UNSIGNED`
estimated_time | `tutorial`      | `meta_value`   | `TIME, NOT NULL, UNSIGNED`
post_id        | `tutorial`      | `meta_value`   |


### Role

Propriété | Table WordPress | Colonne    | Détail(s)
----------|-----------------|------------|----------
role_key  | `posts`         | `ID`       | N/A
name      | `posts`         | `meta_key` | N/A

### Tool

Propriété | Table WordPress | Colonne      | Détail(s)
----------|-----------------|--------------|----------
Tool_id   | `terms`         | `term_id`    | N/A
name      | `terms`         | `name`       | N/A
slug      | `terms`         | `slug`       | N/A
image     | `termmeta`      | `meta_value` | N/A

### Material

Propriété   | Table WordPress | Colonne      | Détail(s)
------------|-----------------|--------------|----------
material_id | `terms`         | `term_id`    | N/A
name        | `terms`         | `name`       | N/A
slug        | `terms`         | `slug`       | N/A
image       | `termmeta`      | `meta_value` | N/A

### Category

Propriété   | Table WordPress | Colonne      | Détail(s)
------------|-----------------|--------------|----------
category_id | `terms`         | `term_id`    | N/A
name        | `terms`         | `name`       | N/A
slug        | `terms`         | `slug`       | N/A
image       | `termmeta`      | `meta_value` | N/A

---

## Associations

Entité 1 | Nom               | Entité 2 | Table WordPress      | Colonne entité 1 | Colonne entité 2   | Détail(s)
---------|-------------------|----------|----------------------|------------------|--------------------|----------
Tutorial | belongs to        | Category | `term_relationships` | `object_id`      | `term_taxonomy_id` |
Tutorial | needs             | Tool     | `term_relationships` | `object_id`      | `term_taxonomy_id` |
Tutorial | requires          | Material | `term_relationships` | `object_id`      | `term_taxonomy_id` |
User     | ajoute en favoris | Tutorial | `posts`              | `ID`             | `post_tutorial`    |
User     | has               | Role     | `postmeta`           | `ID`             | `meta_value`       |
User     | writes            | Comment  | `postmeta`           | `ID`             | `meta_value`       |

---
