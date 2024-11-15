<?
class Pedido
{
    private $idPedido;
    private $fecha;
    private $dniCliente;
    private $nTarjeta;
    private $dirEntrega;


    public function __construct($idPedido, $dirEntrega, $nTarjeta, $dniCliente)
    {
        $this->idPedido = $idPedido;
        $this->$dirEntrega = $dirEntrega;
        $this->$nTarjeta = $nTarjeta;
        $this->fecha = date('Y-m-d');
        $this->dniCliente = $dniCliente;
    }

    function existe($link)
    {
        $consulta = $link->prepare("SELECT * FROM pedidos where idPedido='$this->idPedido'");
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    function insertar($link)
    {
        $consulta = $link->prepare("INSERT into pedidos (idPedido, fecha, dirEntrega, nTarjeta, dniCliente) values ('$this->idPedido', '$this->fecha', '$this->dirEntrega', '$this->nTarjeta', '$this->dniCliente')");
        $consulta->execute();
    }
}
