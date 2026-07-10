  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

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
          <li>
            <a href="{{ route('observasi-bahaya.index') }}">
              <i class="bi bi-circle"></i><span>Observasi Bahaya</span>
            </a>
          </li>
          <li>
            <a href="{{ route('inpeksik3.index') }}">
              <i class="bi bi-circle"></i><span>Inpeksi K3</span>
            </a>
          </li>
          <li>
            <a href="{{ route('pelatihanhse.index') }}">
              <i class="bi bi-circle"></i><span>Pelatihan HSE</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>MANAJEMEN</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>IBPR/HIRARC</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Manajemen APD</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Register Dokumen</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Tanggap Darurat</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>LAPORAN</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>Statistik HSE</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

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

    </ul>

  </aside><!-- End Sidebar-->