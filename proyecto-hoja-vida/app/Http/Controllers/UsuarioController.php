<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Educacion;
use App\Models\ExperienciaLaboral;
use App\Models\Certificacion;
use App\Models\Referencia;
use App\Models\Documento;
use App\Models\Habilidad;
use App\Models\Idioma;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'primer_nombre'    => 'required|string|max:50',
            'primer_apellido'  => 'required|string|max:50',
            'tipo_documento'   => 'required|string|max:20',
            'numero_documento' => 'required|string|max:30',
            'fecha_nacimiento' => 'required|date',
            'telefono'         => 'required|string|max:20',
            'correo'           => 'required|email|max:100',
        ]);

        $data = $request->all();
        $data['fecha_registro'] = now();

        // Subir foto de perfil si viene
        if ($request->hasFile('foto_perfil')) {
            $data['foto_perfil'] = $request->file('foto_perfil')->store('fotos', 'public');
        }

        $usuario = Usuario::create($data);

        return redirect()->route('usuarios.show', $usuario->id_usuario)
                         ->with('success', 'Usuario creado correctamente');
    }

    // Ver hoja de vida completa
    public function show($id)
    {
        $usuario = Usuario::with([
            'educaciones',
            'experiencias',
            'certificaciones',
            'referencias',
            'documentos',
            'habilidades',
            'idiomas'
        ])->findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    // Formulario de edición
    public function edit($id)
    {
        $usuario    = Usuario::findOrFail($id);
        $habilidades = Habilidad::all();
        $idiomas    = Idioma::all();
        return view('usuarios.edit', compact('usuario', 'habilidades', 'idiomas'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->except(['_token', '_method', 'foto_perfil']);

        if ($request->hasFile('foto_perfil')) {
            $data['foto_perfil'] = $request->file('foto_perfil')->store('fotos', 'public');
        }

        $usuario->update($data);

        return redirect()->route('usuarios.show', $id)
                         ->with('success', 'Perfil actualizado');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario eliminado');
    }
}
