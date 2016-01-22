{include file="structure/top.tpl"}
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Dashboard</a>
        </li>
        <li class="active">{$menuname}</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>{$menuname}</h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="#">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-themeprimary">
            <span class="widget-caption themeprimary">{$menuname}</span>
        </div><!--Widget Header-->
        <div class="widget-body">
            <div class="task-container">
                {$form}
            </div>
        </div><!--Widget Body-->
    </div>
</div>
<!-- /Page Body -->
{include file="structure/footer.tpl"}