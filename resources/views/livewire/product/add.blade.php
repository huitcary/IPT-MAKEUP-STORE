<div>
    <div class="container mt-5" >
        <div class="container d-flex justify-content-center">
            <div id="" class="card w-50 s bg-light" style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.266); ">
           
                <h5 class="text-center mt-3" style="color: #000;">Add Product</h5>
                <hr>
                @csrf
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" wire:model.defer="name" >
                        <label for="name">Product</label>  
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="stock" class="form-control" wire:model.defer="stock" >
                        <label for="stock">Stock</label>  
                    </div>
                    <div class="form-floating mb-3">
                        <input type="price" name="price" class="form-control" wire:model.defer="price" >
                        <label for="price">Price</label>  
                    </div>
                    
                    <input type="file" class="form-control" name="image_path" wire:model.defer="image" multiple> 
                 
                    <div class="form-group mb-3 d-grid gap-2 d-md-flex justify-content-center mt-5">
                        <button id="" class="btn w-25" style="background-color: rgb(187, 101, 115); color: #000;" type="submit"  wire:click="add()">
                            Add
                        </button>
                        <button id="" class="btn w-25 btn-secondary text-light" type="submit" wire:click="back()">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
