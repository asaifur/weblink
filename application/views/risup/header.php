<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page->meta_title; ?></title>
    <meta name="description" content="<?php echo $page->meta_description; ?>">
    <meta name="keywords" content="<?php echo $page->keywords; ?>">
    <meta name="author" content="<?php echo $page->meta_author; ?>">
    <meta property="og:title" content="<?php echo $page->meta_title; ?>">
    <meta property="og:description" content="<?php echo $page->meta_description; ?>">
    <meta property="og:image" content="<?php echo base_url('assets/uploads/img/') . $page->og_image; ?>">
    <meta property="og:url" content="<?php echo current_url(); ?>">
    <link rel="icon" href="<?php echo base_url('assets/uploads/img/') . $domain->favicon; ?>" type="image/x-icon">

    <!-- RisUp Kitchen Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/risup/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>