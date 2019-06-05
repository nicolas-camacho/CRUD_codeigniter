<style type="text/css">
    #container
    {
        width: 900px;
        background-color: #d8d8d8;
        margin: auto;
        padding: 20px;
        font-size: 14px;
        font-family: tahoma;
    }
    .crud
    {
        font-size: 12px;
        width: 100%;
    }
    .crud th
    {
        background-color: #242424;
        color: #efefef;
        padding: 10px;
    }
    .crud td
    {
        background-color: #efefef;
        padding: 10px;
        color: #242424;
    }
    .crud tr .even td
    {
        background-color: #efefef;
    }
    .success
    {
        color: green;
    }
</style>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div id="container" class="container">
    <h1>Post Listing</h1>
    <?php if($msg = $this->session->flashdata("message")): ?>
        <p class="success">
            <?=$msg?>
        </p>
    <?php endif; ?>
    <p><a href="<?=site_url('post_controller/create')?>">New Post</a></p>
    <table id="post-list" class="table table-bordered table-stripe table-hover" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Post Content</th>
                <th>Post Status</th>
                <th>Post Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#post-list').DataTable({
            "ajax",{
                url:"/post_controller/get_post",
                type:"GET"
            },
        });
    });
</script>