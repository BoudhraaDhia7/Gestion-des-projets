<aside id="sidebar-wrapper">
    <img src="{{asset("assets/img/logo.gif")}}" alt="" class="rounded ml-4 pr-2" >
    <div class="sidebar-brand">

      <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Accueil</li>
        <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> <span>Page d'accueil</span></a></li>
        <li class="menu-header">Project</li>
        @if(!Auth::user()->can('manage-users'))
        <li class="{{ Request::route()->getName() == 'order' ? ' active' : '' }}"><a class="nav-link" href="/home/emp/{{auth()->user()->name}}/travail"><i class="fa fa-table"></i> <span>Consulter les Ordre de Travail</span></a></li>
        @endif
        @if(Auth::user()->can('manage-users'))
        <li class="{{ Request::route()->getName() == 'ViewProject' ? ' active' : '' }}"><a class="nav-link" href="{{ route('ViewProject') }}"><i class="fas fa-map-marked" style="margin-left: 0"></i> <span>Ajouter projet</span></a></li>
        <li class="{{ Request::route()->getName() == 'ViewAllProjet' ? ' active' : '' }}"><a class="nav-link" href="{{ route('ViewAllProjet') }}"><i class="fa fa-globe-africa"></i> <span>Map(Tout les projets)</span></a></li>
        <li class="menu-header">Mise a jours projet</li>
        <li class="{{ Request::route()->getName() == 'ViewNewProject' ? ' active' : '' }}"><a class="nav-link" href="{{ route('ViewNewProject') }}"><i class="fas fa-plus-circle" style="margin-left: 0"></i></i> <span>Nouveau projet</span></a></li>
        <li class="{{ Request::route()->getName() == 'ViewStartedProject' ? ' active' : '' }}"><a class="nav-link" href="{{ route('ViewStartedProject') }}"><i class="fas fa-spinner" style="margin-left: 0"></i> <span>Projet en cours</span></a></li>
        <li class="{{ Request::route()->getName() == 'EditProject' ? ' active' : '' }}"><a class="nav-link" href="{{ route('EditProject') }}"><i class="fas fa-check-circle" style="margin-left: 0"></i> <span>Projets Achevés</span></a></li>
        <li class="menu-header">Responsables des projets</li>
        <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span style="font-size: 13px">Consulter les responsables des projets</span></a></li>
        <li class="{{ Request::route()->getName() == 'AddEmpolye' ? ' active' : '' }}"><a class="nav-link" href="{{ route('AddEmpolye') }}"><i class="fa fa-user-plus"></i> <span style="font-size: 13px">Ajouter un responsable du projet</span></a></li>
        <li class="menu-header">Catégorie</li>
        <li class="{{ Request::route()->getName() == 'AddCat' ? ' active' : '' }}"><a class="nav-link" href="{{ route('AddCat') }}"><i class="fa fa-plus-circle" ></i> <span>Ajouter une catégorie</span></a></li>
        <li class="{{ Request::route()->getName() == 'ViewCat' ? ' active' : '' }}"><a class="nav-link" href="{{ route('ViewCat') }}"><i class="fa fa-wrench"></i> <span>Mise à jour des catégories</span></a></li>
        <li class="menu-header">Messagerie</li>
        <li class="{{ Request::route()->getName() == 'Viewmsg' ? ' active' : '' }}"><a class="nav-link" href="{{ route('Viewmsg') }}"><i class="fa fa-envelope"></i> <span>Messages reçu</span></a></li>
        <li class="menu-header">Statistique</li>
        <li class="{{ Request::route()->getName() == 'stat' ? ' active' : '' }}"><a class="nav-link" href="{{ route('stat') }}"><i class="fas fa-poll"></i> <span>Statistique des projet</span></a></li>
        @endif
        @if(!Auth::user()->can('manage-users'))
        <li class="menu-header">Contactez nous</li>
        <li class="{{ Request::route()->getName() == 'Newmsg' ? ' active' : '' }}"><a class="nav-link" href="{{ route('Newmsg') }}"><i class="fa fa-envelope"></i> <span>Contacter adminstration</span></a></li>
        @endif


    </ul>
  </aside>
