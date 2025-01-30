<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $this->load->view('layout/sidebar'); ?>

    

      <!-- Main Content -->
      <div id="content">

      <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

                   <!-- Page Heading -->
                   <nav aria-label="breadcrumb">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('/usuarios'); ?>">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
  </ol>
</nav>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a title="Volte a Pagina Anterior" href="<?php echo base_url('/usuarios'); ?>" class="btn btn-danger float-right btn-sm" > 
              <i class="fa-solid fa-chevron-left"></i>&nbsp; Voltar</a>
            </div>
      <div class="card-body">
      <form method="POST" name="form_edit">
  <div class="form-group row">

    <div class="col-md-4">
    <label>Nome</label>
    <input type="text" class="form-control" name="first_name" value="<?php echo $usuario->first_name; ?>">
    <?php echo form_error('first_name', '<small class="form-text text-danger">','</small>'); ?>
    </div>

    <div class="col-md-4">
    <label>Sobrenome</label>
    <input type="text" class="form-control" name="last_name" value="<?php echo $usuario->last_name; ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="col-md-4">
    <label>Login</label>
    <input type="email" class="form-control" name="email" value="<?php echo $usuario->email; ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    </div>

    <div class="form-group row">

    <div class="col-md-4">
    <label>Usuario</label>
    <input type="text" class="form-control" name="username" value="<?php echo $usuario->username; ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="col-md-4">
    <label>Ativo</label>
    <select class="form-control" name="active">
    <option value="0" <?php echo ($usuario->active == 0 ? 'selected' : ''); ?>>Não</option>
    <option value="1" <?php echo ($usuario->active == 1 ? 'selected' : ''); ?>>Sim</option>
    </select>
    </div>
    <div class="col-md-4">
    <label>Hierarquia</label>
    <select class="form-control" name="perfil">
    <option value="2" <?php echo ($perfil_usuario->id == 2 ? 'selected' : ''); ?>>Vendedor</option>
    <option value="1" <?php echo ($perfil_usuario->id == 1 ? 'selected' : ''); ?>>Administrador</option>
    </select>
    </div>
    </div>

    <div class="form-group row">
    <div class="col-md-6">
    <label>Senha</label>
    <input type="password" class="form-control" name="password" value="">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="col-md-6">
    <label>Confirme a Senha</label>
    <input type="password" class="form-control" name="confirm_password" value="">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
  
  </div>

  <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
</form>
      </div>
      <!-- End of Main Content -->
