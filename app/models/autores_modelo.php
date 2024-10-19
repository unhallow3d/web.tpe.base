<?php
require_once 'abstract_modelo.php';
class autores_modelo extends abstract_modelo{
    
    public function obtenerAutores(){
        $query = $this->db->prepare('SELECT * FROM autores ORDER BY nombre_autor');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function obtenerAutor($id){
        $query = $this->db->prepare('SELECT * FROM autores WHERE id_autor = ? LIMIT 1');
        $query->execute([$id]);
        return $query->fetchObject();
    } 
    public function agregarAutor($nombre, $nacionalidad, $archivo_foto) {
        $query = $this->db->prepare('INSERT INTO autores (nombre_autor, nacionalidad_autor, archivo_foto) VALUES (?, ?, ?)');
        return $query->execute([$nombre, $nacionalidad, $archivo_foto]);
    }
    
    public function editarAutor($id, $nombre, $nacionalidad, $archivo_foto) {
        $query = $this->db->prepare('UPDATE autores SET nombre_autor = ?, nacionalidad_autor = ?, archivo_foto = ? WHERE id_autor = ? LIMIT 1');
        return $query->execute([$nombre, $nacionalidad, $archivo_foto, $id]);
    }
    
    public function eliminarAutor($id) {
        $query = $this->db->prepare('DELETE FROM autores WHERE id_autor = ? LIMIT 1');
        return $query->execute([$id]);
    }
    
}