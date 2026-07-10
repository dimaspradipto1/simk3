<?php

/*
 * Single source of truth for which roles can access each HSE module.
 * Used by the sidebar (menu visibility) and the dashboard (widget visibility)
 * so the two never drift out of sync.
 *
 * A module left out of this map (e.g. 'laporan-insiden') is accessible to all roles.
 */
return [
    'observasi-bahaya' => ['admin', 'hsemanger', 'supervisor', 'karyawan', 'auditor'],
    'inpeksik3' => ['admin', 'hsemanger', 'supervisor', 'kontraktor', 'auditor'],
    'pelatihanhse' => ['admin', 'hsemanger', 'karyawan', 'auditor'],
    'ibpr' => ['admin', 'hsemanger', 'direksi', 'auditor'],
    'apd' => ['admin', 'hsemanger', 'supervisor', 'karyawan', 'timtanggapdarurat', 'auditor'],
    'dokumen' => ['admin', 'hsemanger', 'kontraktor', 'direksi', 'auditor'],
    'tanggap-darurat' => ['admin', 'hsemanger', 'supervisor', 'karyawan', 'kontraktor', 'paramedis', 'timtanggapdarurat', 'auditor'],
    'statistik' => ['admin', 'hsemanger', 'direksi', 'auditor'],
];
