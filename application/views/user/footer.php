<script type="text/javascript" src="<?=base_url()?>js/users.js?<?=rand(1,1000)?>"></script>
<script>
<?
    if(isset($users)){
        foreach($users as $users){
            echo 'USR.'.$users.'();
';
        }
    }
     ?>

</script>

</body>
</html>