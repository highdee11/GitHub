<template>
    <div id="dashboard" class="container-fluid">  
        <div class="row">
            <div class="col-12">

            <div id="exampleModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">CREATE NEW TEMPLATE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="mb-5">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter template title">
                            </div>
                        </form>
                        <router-link to="/create-new-template"><button data-dismiss="modal" type="button" class="btn btn-success">Create</button></router-link>
                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Close</button> 
                    </div> 
                    </div>
                </div>
            </div>

            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right mb-3">
                Create New Template
            </button> 
        </div>
        <div class="col-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>No Of Sections</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> 
                </tbody> 
            </table>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'dashboard',
    created(){},
}
</script>

<style scoped>
    #dashboard{ 
        padding: 40px auto;
        position: absolute;
        top:0px;
        bottom:0px;
        margin: auto;
        height: fit-content;
        width: 100%;
    }
</style>

<style >
    .modal-title {
        margin-bottom: 0;
        line-height: 1.5;
        color: gray;
        font-size: 14px;
    }
    .modal .btn-secondary{
        padding: 7px 20px;
        font-size: 13px;
        border-radius: 2px;
        background: #cc4b4b;
        border: none;
    }
    .modal .btn-success{
        padding: 7px 20px;
        font-size: 13px;
        border-radius: 2px;
        background: green;
        border: none;
        margin-right: 10px;
    }
    .container-fluid{
        padding: 0px 100px;
    }
</style>