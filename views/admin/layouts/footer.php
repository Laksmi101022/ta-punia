<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>
                <script>
                    document.write(new Date().getFullYear());
                </script> &copy; Pondok Gita Ubud
            </p>
        </div>
    </div>
</footer>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="<?= asset('/admin/assets/js/feather-icons/feather.min.js') ?>"></script>
<script src="<?= asset('/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

<script src="<?= asset('/admin/assets/js/app.js') ?>"></script>

<script src="<?= asset('/admin/assets/js/main.js') ?>"></script>

<!-- Placeholder untuk script tambahan -->
<?php
if (!empty($js)) {
    echo $js;
}

if (!empty($scripts)) {
    echo $scripts;
}
?>
</body>

</html>