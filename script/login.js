function Login($scope){
    $scope.Enter = function () {
        $scope.userName = "";
        $scope.passWord = "";
    }
    $scope.Register = function () {
        $scope.userName = "EmailAddress";
    }
    $scope.Hash = function () {
        var input = $scope.userName;
        $.getJSON('../php/phpass-0.3/password.php', { word: input, hash: $('#output').html() }, function (data) {
            $('#output').text(data.hash);
            $('#pass').text(data.pass);
        });

    }
}