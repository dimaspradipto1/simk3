  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    @php
        $role = auth()->user()->role;
        $canAccess = fn (string $module) => in_array($role, config("hse_menu.$module", []));
    @endphp

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>OPERASIONAL</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('laporan-insiden.index') }}">
              <i class="bi bi-circle"></i><span>Laporan Insiden</span>
            </a>
          </li>
          @if ($canAccess('observasi-bahaya'))
            <li>
              <a href="{{ route('observasi-bahaya.index') }}">
                <i class="bi bi-circle"></i><span>Observasi Bahaya</span>
              </a>
            </li>
          @endif
          @if ($canAccess('inpeksik3'))
            <li>
              <a href="{{ route('inpeksik3.index') }}">
                <i class="bi bi-circle"></i><span>Inpeksi K3</span>
              </a>
            </li>
          @endif
          @if ($canAccess('pelatihanhse'))
            <li>
              <a href="{{ route('pelatihanhse.index') }}">
                <i class="bi bi-circle"></i><span>Pelatihan HSE</span>
              </a>
            </li>
          @endif
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>MANAJEMEN</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @if ($canAccess('ibpr'))
            <li>
              <a href="{{ route('ibpr.index') }}">
                <i class="bi bi-circle"></i><span>IBPR/HIRARC</span>
              </a>
            </li>
          @endif
          @if ($canAccess('apd'))
            <li>
              <a href="{{ route('apd.index') }}">
                <i class="bi bi-circle"></i><span>Manajemen APD</span>
              </a>
            </li>
          @endif
          @if ($canAccess('dokumen'))
            <li>
              <a href="{{ route('dokumen.index') }}">
                <i class="bi bi-circle"></i><span>Register Dokumen</span>
              </a>
            </li>
          @endif
          @if ($canAccess('tanggap-darurat'))
            <li>
              <a href="{{ route('tanggap-darurat.index') }}">
                <i class="bi bi-circle"></i><span>Tanggap Darurat</span>
              </a>
            </li>
          @endif
        </ul>
      </li><!-- End Forms Nav -->

      @if ($canAccess('statistik'))
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>LAPORAN</span><i
              class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('statistik.index') }}">
                <i class="bi bi-circle"></i><span>Statistik HSE</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
      @endif

      @if ($role === 'admin')
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('karyawan.index') }}">
            <i class="bi bi-person"></i>
            <span>Data Karyawan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('departemen.index') }}">
            <i class="bi bi-person"></i>
            <span>Data Departemen</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('user.index') }}">
            <i class="bi bi-person"></i>
            <span>Pengguna</span>
          </a>
        </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->
