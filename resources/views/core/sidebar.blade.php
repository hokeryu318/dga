<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> Dashboard </a>
      </li>

      <li class="nav-title">
        Masters
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Masters</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.area.index') }}"><i class="icon-puzzle"></i> Areas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.category.index') }}"><i class="icon-puzzle"></i> iForm Categoires</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.iform.index') }}"><i class="icon-puzzle"></i> iForms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.equip.index') }}"><i class="icon-puzzle"></i> Equipments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.worker.index') }}"><i class="icon-puzzle"></i> Workers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.work.index') }}"><i class="icon-puzzle"></i> Works</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
