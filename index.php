<?php
# Carrega os CSS do tema
require 'load_css.php';

# Carrega os JS do tema
require 'load_js.php';

# Funções principais do tema
require 'plugins/wp-bootstrap-nav-walker.php';


# Register custom post type
require 'register_custom_post_type.php';

# Register custom taxonomy
require 'register_custom_taxonomy.php';

# Form render
require 'form_render.php';

# Register custom meta box
require 'register_custom_meta_box.php';

# General Functions
require 'functions_general.php';

# Actions
require 'functions_actions.php';

# Filters
require 'functions_filters.php';