<?
class Linea 
{
    private $idPedido;
    private $idProducto;
    private $cantidad;
    
    public function __construct($idPedido, $idProducto, $cantidad){
        $this->idPedido = $idPedido;
        $this->idProducto = $idProducto;
        $this->cantidad = $cantidad;  
    }

    static function getall($link){
        $consulta = $link->prepare("SELECT * FROM lineaspedidos");
        $consulta->execute();
        return $consulta;
    }
    
    function insertar($link){
        $consulta = $link->prepare("SELECT MAX(nlinea) as max from lineaspedidos where idPedido='$this->idPedido'");
        $consulta->execute();
        $numeroLinea=$consulta->fetch(PDO::FETCH_ASSOC);
        $nl=(int)$numeroLinea['max']+1;
        $consulta = $link->prepare("INSERT into lineaspedidos (idPedido,  idProducto, cantidad,nlinea) values (:idPedido,:idProducto, :cantidad, :numL)");
        $consulta->bindParam(':idPedido',$this->idPedido);		
        $consulta->bindParam(':idProducto',$this->idProducto);
        $consulta->bindParam(':cantidad',$this->cantidad);
        $consulta->bindParam(':numL',$nl);
        $consulta->execute();
            
    }

}