<script>
        function createDockerTable(info) {
            var tableHtml = '<table border="1">';
            for (var key in info) {
                tableHtml += '<tr><td>' + key + '</td><td>' + info[key] + '</td></tr>';
            }
            tableHtml += '</table>';
            return tableHtml;
        }

    function dockerStatus(){
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_docker_status')}}", data, function(response) {
            var dockerInfo = JSON.parse(response)
            
            var tableHtml = '<table border="1">';
            for (var key in dockerInfo) {
                tableHtml += '<tr><td>' + key + '</td><td>' + dockerInfo[key] + '</td></tr>';
            }
            tableHtml += '</table>';

// HTML içeriğini güncelle
$('.system-info').html(tableHtml);

            Swal.close();
        }, function(error) {
            response = JSON.parse(error);
            if(response.status == 404) {
                $('.system-info').html(`
                    @include("alert", [
                        "type" => "danger",
                        "title" => "Hata",
                        "message" => "lshw paketini kurmanız gerekmektedir. apt install lshw yazarak kurabilirsiniz."
                    ])
                    <div class="col-12">
                        <button class="btn btn-primary" onclick="installLshw()"><i class="fas fa-check-circle"></i> {{ __("Lshw Kurulumu Yap") }}</button>
                    </div>
                `);
                Swal.close();
            } else {
                showSwal(response.message, 'error');
            }
        });
    }
</script>


