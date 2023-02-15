<?php
$id = request('id');
session()->push('panier',$id);
return redirect()->route('panier');
?>