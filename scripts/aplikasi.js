        $(function(){
               $(document).on('click','.add-supplier',function(e){
                e.preventDefault();
                $("#modal-supplier").modal('show');
                $(".modal-title").html('TAMBAH SUPPLIER');
                $.get("view/supplier/supplier_form.php",
                    {id_pelamar:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-supplier',function(e){
                e.preventDefault();
                $("#modal-ubah-supplier").modal('show');
                $(".modal-title").html('UBAH SUPPLIER');
                $.get("view/supplier/supplier_ubah.php",
                {id_supp:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-material',function(e){
                e.preventDefault();
                $("#modal-material").modal('show');
                 $(".modal-title").html('TAMBAH MATERIAL');
                $.get("view/material/material_form.php",
                {id_info:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.ubah-material',function(e){
                e.preventDefault();
                $("#modal-ubah-material").modal('show');
                 $(".modal-title").html('UBAH MATERIAL');
                $.get("view/material/material_ubah.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                $(document).on('click','.add-harga',function(e){
                e.preventDefault();
                $("#modal-harga").modal('show');
                 $(".modal-title").html('TAMBAH HARGA');
                $.get("view/harga/harga_form.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
                         $(document).on('click','.detail-harga',function(e){
                e.preventDefault();
                $("#modal-detail-harga").modal('show');
                 $(".modal-title").html('DETAIL HARGA');
                $.get("view/harga/harga_lihat.php",
                {id_mat:$(this).attr('data-id')},
                 function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
         
        });